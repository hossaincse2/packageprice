<?php

use Illuminate\Database\Seeder;

class UserGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->insert([
            'group_name' => 'Admin',
            'role' => 'admin',
            'GROUP_CODE' => 'admin',
        ]);

        DB::table('user_groups')->insert([
            'group_name' => 'Member',
            'role' => 'member',
            'GROUP_CODE' => 'member',
        ]);
    }
}
