<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ItemPaymentSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('item_payments')->insert([
            'item_id' => 1,
            'payment_id' => 1,
            'amount' => 2000
        ]);

        DB::table('item_payments')->insert([
            'item_id' => 2,
            'payment_id' => 2,
            'amount' => 3000
        ]);

        DB::table('item_payments')->insert([
            'item_id' => 3,
            'payment_id' => 3,
            'amount' => 2500
        ]);

        DB::table('item_payments')->insert([
            'item_id' => 4,
            'payment_id' => 4,
            'amount' => 3000
        ]);

        DB::table('item_payments')->insert([
            'item_id' => 4,
            'payment_id' => 3,
            'amount' => 2500
        ]);

        DB::table('item_payments')->insert([
            'item_id' => 4,
            'payment_id' => 2,
            'amount' => 3000
        ]);
    }
}
