<?php
/**
 * @file    UsersTableSeeder.php
 *
 *
 * PHP Version 7
 *
 * @author  <Sandun Dissanayake> <java2012@gmail.com>
 *
*/

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        $roles_data = [
        				[
			        		'name' => 'staff',
			        		'display_name' => 'Staff',
			        		'description' => 'Staff member',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'parents',
			        		'display_name' => 'Parents',
			        		'description' => 'They are parents of student',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'student',
			        		'display_name' => 'StudentModel',
			        		'description' => 'They are students',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	]
			        ];

        foreach ($roles_data as $key => $role_data) {

        	DB::table('roles')->insert($role_data);
        }
    }
}
