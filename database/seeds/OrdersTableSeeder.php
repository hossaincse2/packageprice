<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'order_number' => '5693113847V9868',
            'payment_method' => 'Paypal', 
            'user_id' => '1',
            'package_id' => '7',
            'api_key' => 'at_7OPkdPOlNbNr',
            'query_count' => '0',
            'status' => 'active',
        ]);

        DB::table('orders')->insert([
            'order_number' => '932699447598Z44',
            'payment_method' => 'Stripe', 
            'user_id' => '2',
            'package_id' => '7',
            'api_key' => 'at_7OPkdPOlNbNr',
            'query_count' => '0',
            'status' => 'active',
        ]);

        DB::table('orders')->insert([
            'order_number' => '932699447598Z44',
            'payment_method' => 'Stripe', 
            'user_id' => '3',
            'package_id' => '1',
            'api_key' => 'at_7OPkdPOlNaNa',
            'query_count' => '0',
            'status' => 'active',
        ]);
    }
}
