<?php
/**
 * @file    TenantHostNamesTableSeeder.php
 *
 *
 * PHP Version 7
 *
 * @author  <Sandun Dissanayake> <java2012@gmail.com>
 *
 */
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TenantHostNamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
        $tenanthost_data = [
        				[
			        		'tenant_id' => 1,
			        		'hostname' => 'localhost',
			        		'status' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'tenant_id' => 1,
			        		'hostname' => 'localhost',
			        		'status' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	],
			        	[
			        		'tenant_id' => 1,
			        		'hostname' => 'localhost',
			        		'status' => 1,
			        		'created_at' => date("Y-m-d H:i:s"),
                			'updated_at' => date("Y-m-d H:i:s")
			        	]
			        ];

        foreach ($tenanthost_data as $key => $host_data) {

        	DB::table('tenant_hostnames')->insert($host_data);
        }
    }
}
