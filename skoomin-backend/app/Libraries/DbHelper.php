<?php
/**
 * @file    DbHelper.php
 *
 * DbHelper Helper
 *
 * PHP Version 7
 *
 * @author  Sandun Dissanayake <java2012@gmail.com>
 *
 * @copyright Copyright Eyepax IT Consulting (Pvt) Ltd.
 */

namespace App\Libraries;

use Illuminate\Support\Facades\DB;

class DbHelper
{
    public function __construct()
    {
    }

    /**
    *  Start Db Transaction.
    */
    public function startTransaction()
    {
        DB::beginTransaction();
    }

    /**
    *  Commit Db Transaction.
    */
    public function commitTransaction()
    {
        DB::commit();
    }

    /**
    *  RollBack Db Transaction.
    */
    public function rollBackTransaction()
    {
        DB::rollBack();
    }
}
