<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'User 1',
            'email' => 'demo@gmail.com', 
            'password' => bcrypt('demo123'),
            'auth_token' => 'auth_7OPkdPOlNbNr',
        ]);

        DB::table('users')->insert([
            'name' => 'User 2',
            'email' => 'demo1@gmail.com', 
            'password' => bcrypt('demo123'),
            'auth_token' => 'auth_7OPkdPOlNbNu',
        ]);

        DB::table('users')->insert([
            'name' => 'User 3',
            'email' => 'demo2@gmail.com', 
            'password' => bcrypt('demo123'),
            'auth_token' => 'auth_7OPkdPOlNbNt',
        ]);
    }
}
