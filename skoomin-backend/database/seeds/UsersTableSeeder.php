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

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker::create();
    	for ($i=0; $i < 10; $i++) {

            $user_data = [
                'first_name' => $faker->firstName,
                'middle_name' => $faker->firstName,
                'last_name' => $faker->firstName,
                'cnic' => $faker->numerify('#########v'),
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('123456'),
                'tenant_id' => $faker->numberBetween(1, 10),
                'remember_token' => str_random(10),
			    'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
            DB::table('users')->insert($user_data);
        }
    }
}
