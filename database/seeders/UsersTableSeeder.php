<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Rasul SAFAROVITCH',
                'email' => 'r.safarovitch@gmail.com',
                'phone' => NULL,
                'email_verified_at' => NULL,
                'password' => '$2y$10$SVmdxHlMNST2HtloLsSQH.MQbBYJgUuIxI7Y6k2h6O7tgW6G76kwS',
                'remember_token' => NULL,
                'status' => 'active',
                'created_at' => '2022-06-10 15:21:10',
                'updated_at' => '2022-06-10 15:21:10',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}