<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{

  public function run(): void
  {

    DB::table('settings')->insert([
      'name'=> 'Primer vencimiento',
    ]);

    DB::table('settings')->insert([
      'name'=> 'Segundo vencimiento',
    ]);
       
  }
}
