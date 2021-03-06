<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(UserGroupsTableSeeder::class);
         $this->call(UserUserGroupsTableSeeder::class);
         $this->call(PackageTableSeeder::class);
         $this->call(OrdersTableSeeder::class);
    }
}
