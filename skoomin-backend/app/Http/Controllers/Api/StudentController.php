<?php

namespace App\Http\Controllers\Api;

use App\StudentModel;
use App\Libraries\Helper;
use Illuminate\Http\Request;
use App\Libraries\ValidationHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Repositories\Contracts\StudentRepositoryInterface;

class StudentController extends Controller
{
    //private variables
    private $helper;
    private $student;
    private $validationHelper;

    public function __construct(
        Helper $helper,
        ValidationHelper $validationHelper,
        StudentRepositoryInterface $studdent
    ) {
        $this->helper = $helper;
        $this->validationHelper = $validationHelper;
        $this->student = $studdent;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return StudentModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $createStudent = $this->student->createStudent($request);
        if ($createStudent['success']) {

            return $this->helper
                        ->response(200,
                            [
                                'message'   => $createStudent['msg'],
                                'data'      => $createStudent['data']
                            ]
                        );
        } else {

            return $this->helper
                        ->response(400,
                                [
                                    'error'     => $createStudent['error'],
                                ]
                            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
