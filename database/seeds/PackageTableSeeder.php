<?php

use Illuminate\Database\Seeder;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'packages_name' => 'Demo',
            'type' => 'free', 
            'query_limit' => '500',
            'price' => '0.00',
            'api_key' => 'at_7OPkdPOlNaN',
        ]);
    }
}
