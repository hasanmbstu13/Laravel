<?php
/**
 * @file    StudentRepositoryInterface.php
 *
 * StudentRepositoryInterface RepositoryInterface
 *
 * PHP Version 7
 *
 * @author  <Sandun Dissanayake> <java2012@gmail.com>
 *
 */
 
namespace App\Repositories\Contracts;
 
interface StudentRepositoryInterface
{
    /**
     * Insert student
     *
     * @param $data
     * @return array
     */
    public function create($data);

    /**
     * @param $request
     * @return mixed
     */
    public function createStudent($request);


}
