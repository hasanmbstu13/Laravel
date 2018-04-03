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

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker::create();
        $permissions_data = [
        				[
			        		'name' => 'create-student',
			        		'display_name' => 'Create StudentModel',
			        		'description' => 'Create a new student',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'edit-student',
			        		'display_name' => 'Edit StudentModel',
			        		'description' => 'Edit student',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'view-student',
			        		'display_name' => 'View StudentModel',
			        		'description' => 'View student',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'create-parent',
			        		'display_name' => 'Create Parent',
			        		'description' => 'Create a new parent',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'edit-parent',
			        		'display_name' => 'Edit Parent',
			        		'description' => 'Edit parent',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'view-parent',
			        		'display_name' => 'View Parent',
			        		'description' => 'View parent',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'create-staff',
			        		'display_name' => 'Create Staff',
			        		'description' => 'Create a new staff',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'edit-staff',
			        		'display_name' => 'Edit Staff',
			        		'description' => 'Edit staff',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'name' => 'view-staff',
			        		'display_name' => 'View Staff',
			        		'description' => 'View staff',
			        		'tenant_id' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	]
			        ];

        foreach ($permissions_data as $key => $permission_data) {

        	DB::table('permissions')->insert($permission_data);
        }
    }
}
