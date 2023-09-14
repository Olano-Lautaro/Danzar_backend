<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SettingSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            UserSeeder::class,
            StudentSeeder::class,
            TutorSeeder::class,
            ItemSeeder::class,
            StudentTutorSeeder::class,
            CategorySeeder::class,
            PaymentSeeder::class,
            ItemStudentSeeder::class,
            RolesSeeder::class,
            Model_has_Roles_table::class,
            ItemPaymentSeeder::class,
            AssistancesSeeder::class
        ]);
        
    }
}
