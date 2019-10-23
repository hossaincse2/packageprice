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
            'package_name' => 'Demo1',
            'type' => 'free', 
            'query_limit' => '500',
            'price' => '0.00',
            'api_key' => 'at_7OPkdPOlNaNa',
        ]);

        DB::table('packages')->insert([
            'package_name' => 'Demo2',
            'type' => 'fixed', 
            'query_limit' => '1000',
            'price' => '100.00',
            'api_key' => 'at_7OPkdPOlNaNd',
        ]);

        DB::table('packages')->insert([
            'package_name' => 'Demo3',
            'type' => 'fixed', 
            'query_limit' => '1500',
            'price' => '150.00',
            'api_key' => 'at_7OPkdPOlNaNs',
        ]); 

        DB::table('packages')->insert([
            'package_name' => 'Demo4',
            'type' => 'monthly', 
            'query_limit' => '2500',
            'price' => '150.00',
            'api_key' => 'at_7OPkdPOlNaNm',
        ]);

        DB::table('packages')->insert([
            'package_name' => 'Demo5',
            'type' => 'yearly', 
            'query_limit' => '15000',
            'price' => '200.00',
            'api_key' => 'at_7OPkdPOlNaNq',
        ]);

        DB::table('packages')->insert([
            'package_name' => 'Demo6',
            'type' => 'yearly', 
            'query_limit' => '30000',
            'price' => '300.00',
            'api_key' => 'at_7OPkdPOlNaNr',
        ]);

        DB::table('packages')->insert([
            'package_name' => 'Demo7',
            'type' => 'monthly', 
            'query_limit' => '25000',
            'price' => '250.00',
            'api_key' => 'at_7OPkdPOlNbNr',
        ]);

        DB::table('packages')->insert([
            'package_name' => 'Demo8',
            'type' => 'yearly', 
            'query_limit' => '35000',
            'price' => '350.00',
            'api_key' => 'at_7OPkdPOlNaNr',
        ]);

        DB::table('packages')->insert([
            'package_name' => 'Demo8',
            'type' => 'fixed', 
            'query_limit' => '1200',
            'price' => '120.00',
            'api_key' => 'at_7OPkdPOlNaNs',
        ]);
    }
}
