<?php

namespace App\Http\Controllers\Admin;

use App\EmployeeDetails;
use App\Helper\Reply;
use App\Http\Requests\User\StoreUser;
use App\Http\Requests\User\UpdateEmployee;
use App\Notifications\NewUser;
use App\Project;
use App\ProjectTimeLog;
use App\Role;
use App\Task;
use App\User;
use App\UserActivity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\Datatables\Facades\Datatables;

class ManageEmployeesController extends AdminBaseController
{

    public function __construct() {
        parent::__construct();
        $this->pageTitle = __('app.menu.employees');
        $this->pageIcon = 'icon-user';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.employees.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.employees.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request) {
        $validate = Validator::make(['job_title' => $request->job_title, 'hourly_rate' => $request->hourly_rate,], [
            'job_title' => 'required',
            'hourly_rate' => 'numeric'
        ]);

        if ($validate->fails()) {
            return Reply::formErrors($validate);
        }

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->mobile = $request->input('mobile');
        $user->save();

        // Notify User
        $user->notify(new NewUser($user));

        if ($user->id) {
            $employee = new EmployeeDetails();
            $employee->user_id = $user->id;
            $employee->job_title = $request->job_title;
            $employee->address = $request->address;
            $employee->hourly_rate = $request->hourly_rate;
            $employee->save();
        }

        $user->attachRole(2);

        return Reply::redirect(route('admin.employees.edit', $user->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $this->employee = User::find($id);
        $this->taskCompleted = Task::where('user_id', $id)->where('status', 'completed')->count();
        $this->hoursLogged = ProjectTimeLog::where('user_id', $id)->sum('total_hours');
        $this->activities = UserActivity::where('user_id', $id)->orderBy('id', 'desc')->get();
        $this->projects = Project::select('projects.id', 'projects.project_name', 'projects.deadline', 'projects.completion_percent')
            ->join('project_members', 'project_members.project_id', '=', 'projects.id')
            ->where('project_members.user_id', '=', $id)
            ->get();
        return view('admin.employees.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $this->userDetail = User::find($id);
        $this->employeeDetail = EmployeeDetails::where('user_id', '=', $this->userDetail->id)->first();
        return view('admin.employees.edit', $this->data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request, $id) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->password != '') {
            $user->password = Hash::make($request->input('password'));
        }
        $user->mobile = $request->input('mobile');
        $user->save();

        $validate = Validator::make(['job_title' => $request->job_title], [
            'job_title' => 'required'
        ]);

        if ($validate->fails()) {
            return Reply::formErrors($validate);
        }

        $employee = EmployeeDetails::where('user_id', '=', $user->id)->first();
        if (empty($employee)) {
            $employee = new EmployeeDetails();
            $employee->user_id = $user->id;
        }
        $employee->job_title = $request->job_title;
        $employee->address = $request->address;
        $employee->hourly_rate = $request->hourly_rate;
        $employee->save();

        return Reply::success(__('messages.employeeUpdated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);

        if ($user->hasRole('admin')) {
            return Reply::error(__('messages.adminCannotDelete'));
        }

        User::destroy($id);
        return Reply::success(__('messages.employeeDeleted'));
    }

    public function data() {
        $users = User::join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->select('users.id', 'users.name', 'users.email', 'users.created_at')
            ->where('roles.name', 'employee')
            ->get();

        return Datatables::of($users)
            ->addColumn('role', function ($row) {
                if ($row->id != 1) {

                    $roleRow = '';

                    if ($row->hasRole('admin')) {
                        $roleRow .= '<div class="radio radio-danger">
                      <input type="radio" name="role_' . $row->id . '" class="assign_role" data-user-id="' . $row->id . '" checked id="admin_role_' . $row->id . '" value="admin">
                      <label for="admin_role_' . $row->id . '"> Admin </label>
                    </div>';
                    }
                    else {
                        $roleRow .= '<div class="radio radio-danger">
                      <input type="radio" name="role_' . $row->id . '" class="assign_role" data-user-id="' . $row->id . '" id="admin_role_' . $row->id . '" value="admin">
                      <label for="admin_role_' . $row->id . '"> Admin </label>
                    </div>';
                    }

                    $roleRow .= '<br>';

                    if ($row->hasRole('project_admin')) {
                        $roleRow .= '<div class="radio radio-info">
                      <input type="radio" name="role_' . $row->id . '" class="assign_role" data-user-id="' . $row->id . '" checked id="project_admin_role_' . $row->id . '" value="project_admin">
                      <label for="project_admin_role_' . $row->id . '"> Project Admin </label>
                    </div>';
                    }
                    else {
                        $roleRow .= '<div class="radio radio-info">
                      <input type="radio" name="role_' . $row->id . '" class="assign_role" data-user-id="' . $row->id . '" id="project_admin_role_' . $row->id . '" value="project_admin">
                      <label for="project_admin_role_' . $row->id . '"> Project Admin </label>
                    </div>';
                    }

                    $roleRow .= '<br>';

                    if (!$row->hasRole('project_admin') && !$row->hasRole('admin')) {
                        $roleRow .= '<div class="radio radio-warning">
                      <input type="radio" name="role_' . $row->id . '" class="assign_role" data-user-id="' . $row->id . '" checked id="none_role_' . $row->id . '" value="none">
                      <label for="none_role_' . $row->id . '"> None </label>
                    </div>';
                    }
                    else {
                        $roleRow .= '<div class="radio radio-warning">
                      <input type="radio" name="role_' . $row->id . '" class="assign_role" data-user-id="' . $row->id . '" id="none_role_' . $row->id . '" value="none">
                      <label for="none_role_' . $row->id . '"> None </label>
                    </div>';
                    }


                    return $roleRow;
                }
                else{
                    return __('messages.roleCannotChange');
                }

            })
            ->addColumn('action', function ($row) {
                return '<a href="' . route('admin.employees.edit', [$row->id]) . '" class="btn btn-info btn-circle"
                      data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                      <a href="' . route('admin.employees.show', [$row->id]) . '" class="btn btn-success btn-circle"
                      data-toggle="tooltip" data-original-title="View Employee Details"><i class="fa fa-search" aria-hidden="true"></i></a>

                      <a href="javascript:;" class="btn btn-danger btn-circle sa-params"
                      data-toggle="tooltip" data-user-id="' . $row->id . '" data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>';
            })
            ->editColumn(
                'created_at',
                function ($row) {
                    return Carbon::parse($row->created_at)->format('d F, Y');
                }
            )
            ->editColumn('name', function ($row) {
                if ($row->hasRole('admin')) {
                    return '<a href="' . route('admin.employees.show', $row->id) . '">' . ucwords($row->name) . '</a> <label class="label label-danger">admin</label>';
                }
                if ($row->hasRole('project_admin')) {
                    return '<a href="' . route('admin.employees.show', $row->id) . '">' . ucwords($row->name) . '</a> <label class="label label-info">project admin</label>';
                }
                return '<a href="' . route('admin.employees.show', $row->id) . '">' . ucwords($row->name) . '</a>';
            })
            ->rawColumns(['name', 'action', 'role'])
            ->make(true);
    }

    public function tasks($userId, $hideCompleted) {
        $tasks = Task::join('projects', 'projects.id', '=', 'tasks.project_id')
            ->select('tasks.id', 'projects.project_name', 'tasks.heading', 'tasks.due_date', 'tasks.status', 'tasks.project_id')
            ->where('tasks.user_id', $userId);

        if ($hideCompleted == '1') {
            $tasks->where('tasks.status', '=', 'incomplete');
        }

        $tasks->get();

        return Datatables::of($tasks)
            ->editColumn('due_date', function ($row) {
                if ($row->due_date->isPast()) {
                    return '<span class="text-danger">' . $row->due_date->format('d M, y') . '</span>';
                }
                return '<span class="text-success">' . $row->due_date->format('d M, y') . '</span>';
            })
            ->editColumn('heading', function ($row) {
                return ucfirst($row->heading);
            })
            ->editColumn('status', function ($row) {
                if ($row->status == 'incomplete') {
                    return '<label class="label label-danger">Incomplete</label>';
                }
                return '<label class="label label-success">Completed</label>';
            })
            ->editColumn('project_name', function ($row) {
                return '<a href="' . route('admin.projects.show', $row->project_id) . '">' . ucfirst($row->project_name) . '</a>';
            })
            ->rawColumns(['status', 'project_name', 'due_date'])
            ->removeColumn('project_id')
            ->make(true);
    }

    public function timeLogs($userId) {
        $timeLogs = ProjectTimeLog::join('projects', 'projects.id', '=', 'project_time_logs.project_id')
            ->select('project_time_logs.id', 'projects.project_name', 'project_time_logs.start_time', 'project_time_logs.end_time', 'project_time_logs.total_hours', 'project_time_logs.memo', 'project_time_logs.project_id')
            ->where('project_time_logs.user_id', $userId);
        $timeLogs->get();

        return Datatables::of($timeLogs)
            ->editColumn('start_time', function ($row) {
                return $row->start_time->format('d M, Y h:i A');
            })
            ->editColumn('end_time', function ($row) {
                if (!is_null($row->end_time)) {
                    return $row->end_time->format('d M, Y h:i A');
                }
                else {
                    return "<label class='label label-success'>Active</label>";
                }
            })
            ->editColumn('project_name', function ($row) {
                return '<a href="' . route('admin.projects.show', $row->project_id) . '">' . ucfirst($row->project_name) . '</a>';
            })
            ->rawColumns(['end_time', 'project_name'])
            ->removeColumn('project_id')
            ->make(true);
    }

    public function export() {
        $rows = User::leftJoin('employee_details', 'users.id', '=', 'employee_details.user_id')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.mobile',
                'employee_details.job_title',
                'employee_details.address',
                'employee_details.hourly_rate',
                'users.created_at'
            )
            ->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $exportArray = [];

        // Define the Excel spreadsheet headers
        $exportArray[] = ['ID', 'Name', 'Email', 'Mobile', 'Job Title', 'Address', 'Hourly Rate', 'Created at'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($rows as $row) {
            $exportArray[] = $row->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Employees', function ($excel) use ($exportArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Employees');
            $excel->setCreator('Worksuite')->setCompany($this->companyName);
            $excel->setDescription('Employees file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($exportArray) {
                $sheet->fromArray($exportArray, null, 'A1', false, false);

                $sheet->row(1, function ($row) {

                    // call row manipulation methods
                    $row->setFont(array(
                        'bold' => true
                    ));

                });

            });


        })->download('xlsx');
    }

    public function assignRole(Request $request) {
        $userId = $request->userId;
        $roleName = $request->role;
        $adminRole = Role::where('name', 'admin')->first();
        $projectAdminRole = Role::where('name', 'project_admin')->first();
        $employeeRole = Role::where('name', 'employee')->first();
        $user = User::find($userId);

        switch ($roleName) {
            case "admin"        :
                $user->detachRoles($user->roles);
                $user->roles()->attach($adminRole->id);
                $user->roles()->attach($employeeRole->id);
                break;

            case "project_admin" :
                $user->detachRoles($user->roles);
                $user->roles()->attach($projectAdminRole->id);
                $user->roles()->attach($employeeRole->id);
                break;

            case "none"         :
                $user->detachRoles($user->roles);
                $user->roles()->attach($employeeRole->id);
                break;
        }
        return Reply::success(__('messages.roleAssigned'));
    }

}
