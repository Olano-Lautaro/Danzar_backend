<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssistancesSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('assistances')->insert([
            'student_id'=> 1,
            'item_id' => 1
        ]);

        DB::table('assistances')->insert([
            'student_id'=> 1,
            'item_id' => 2
        ]);

        DB::table('assistances')->insert([
            'student_id'=> 2,
            'item_id' => 1
        ]);

        DB::table('assistances')->insert([
            'student_id'=> 2,
            'item_id' => 2
        ]);

        DB::table('assistances')->insert([
            'student_id'=> 3,
            'item_id' => 3
        ]);

        DB::table('assistances')->insert([
            'student_id'=> 4,
            'item_id' => 4
        ]);

        DB::table('assistances')->insert([
            'student_id'=> 5,
            'item_id' => 5
        ]);
    }
}
