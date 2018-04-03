<?php
/**
 * @file    StudentRepository.php
 *
 * StudentRepository Repository
 *
 * PHP Version 7
 *
 * @author  <Sandun Dissanayake> <java2012@gmail.com>
 *
 */

namespace App\Repositories;

use App\StudentModel;
use App\Libraries\Helper;
use App\Libraries\DbHelper;
use App\Libraries\ValidationHelper;
use App\Repositories\Contracts\StudentRepositoryInterface;

class StudentRepository implements StudentRepositoryInterface
{
    //Private variables
    private $helper;
    private $student;
    private $dbHelper;
    private $validationHelper;

    /**
    * UserModel $user
    * Helper $helper
    */
    public function __construct(
        Helper $helper,
        DbHelper $dbHelper,
        StudentModel $student,
        ValidationHelper $validationHelper
    )
    {
        $this->helper           = $helper;
        $this->dbHelper         = $dbHelper;
        $this->student          = $student;
        $this->validationHelper = $validationHelper;
    }

    /**
     * @description Save details
     *
     * @param $data
     *
     * @return bool|int
     */
    public function create($data)
    {
        return $this->student->create($data);
    }

    /**
     * @description Update details
     *
     * @param $data
     * @param $id
     *
     * @return bool|int
     */
    public function update($data, $id)
    {
        return  $query = $this->student->where('id', $id)
                                ->update($data);
    }

    /**
     * @description Delete record
     *
     * @param $id
     *
     * @return bool|int
     */
    public function delete($id)
    {
        return $this->student->find($id)->delete();
    }

    /**
     * @description Get details of single item
     *
     * @param $id
     * @param $columns
     *
     * @return array
     */
    public function find($id, $columns = ['*'])
    {
        return $this->student->find($id, $columns);
    }

    /**
     * @param $request
     * @return $this
     */
    public function createStudent($request)
    {

        $tenant_id = $request->tenant['tenant_id'];
        $students = $request['students'];
        if(empty($students)){

            return [
                'success' => false,
                'error'   => 'Please fill at least on student.',
            ];
        }

        $errors = [];
        $dataSet = [];
        foreach ($students as $key => $student){

            $data = [
                'profile_url'       => isset($student['profile_url']) ? $student['profile_url'] : '',
                'first_name'        => isset($student['first_name']) ? $student['first_name'] : '',
                'last_name'         => isset($student['last_name']) ? $student['last_name'] : '',
                'middle_name'       => isset($student['middle_name']) ? $student['middle_name'] : '',
                'email'             => isset($student['email']) ? $student['email'] : '',
                'phone_no'          => isset($student['phone_no']) ? $student['phone_no'] : '',
                'cnic'              => isset($student['cnic']) ? $student['cnic'] : '',
                'gender'            => isset($student['gender']) ? $student['gender'] : '',
                'date_of_birth'     => isset($student['date_of_birth']) ? $student['date_of_birth'] : '',
                'class_id'          => isset($student['class_id']) ? $student['class_id'] : '',
                'parent_id'         => isset($student['parent_id']) ? $student['parent_id'] : '',
                'address'           => isset($student['address']) ? $student['address'] : '',
                'tenant_id'         => $tenant_id
            ];

            $validatorStudentModel = $this->validationHelper->validation(
                $data,
                StudentModel::$createRules
            );
            if ($validatorStudentModel->fails()) {

                $errors[$key] = $validatorStudentModel->messages();
            }
            $dataSet[$key] = $data;
        }

        if(!empty($errors)){

            return [
                        'success'   => false,
                        'error'     => $errors
                    ];
        }

        $dbErrors = [];
        $createdData = [];
        $this->dbHelper->startTransaction();
        foreach ($dataSet as $key => $data){

            $create = $this->create($data);
            if(!$create){

                $dbErrors[$key] =
                    [
                        'Something went wrong, Please try again later.'
                    ];
            }
            $createdData[$key] = $data;
        }

        if(!empty($dbErrors)){

            $this->dbHelper->rollBackTransaction();

            return [
                'success'   => false,
                'error'     => $dbErrors
            ];
        }

        $this->dbHelper->commitTransaction();

        return [
            'success'   => true,
            'msg'       => 'You have added student successfully.!',
            'data'      => $createdData
        ];
    }

}
