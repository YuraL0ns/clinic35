<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Doctor;
use App\Models\DoctorService;
use App\Models\Razdel;
use App\Models\Service;
use App\Models\Sales;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            AdminUserSeeder::class,
            RolesSeeder::class,
            RazdelsSeeder::class,
            DoctorsSeeder::class,
            ServicesSeeder::class,
            Doctor_serviceSeeder::class,
            PointsSeeder::class,
            Point_serviceSeeder::class,

        ]);

    }
}
