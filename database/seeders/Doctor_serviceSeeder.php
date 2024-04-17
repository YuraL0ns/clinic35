<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Doctor_serviceSeeder extends Seeder
{
    public function run()
    {
        DB::table('doctor_service')->insert([
            ['doctor_id' => '9', 'service_id' => '1'],
            ['doctor_id' => '24', 'service_id' => '1'],
            ['doctor_id' => '6', 'service_id' => '1'],
            ['doctor_id' => '35', 'service_id' => '1'],
            ['doctor_id' => '43', 'service_id' => '1'],
            ['doctor_id' => '1', 'service_id' => '1'],
            ['doctor_id' => '17', 'service_id' => '2'],
            ['doctor_id' => '30', 'service_id' => '3'],
            ['doctor_id' => '36', 'service_id' => '3'],
            ['doctor_id' => '41', 'service_id' => '3'],
            ['doctor_id' => '25', 'service_id' => '3'],
            ['doctor_id' => '16', 'service_id' => '4'],
            ['doctor_id' => '22', 'service_id' => '4'],
            ['doctor_id' => '39', 'service_id' => '4'],
            ['doctor_id' => '29', 'service_id' => '4'],
            ['doctor_id' => '32', 'service_id' => '4'],
            ['doctor_id' => '19', 'service_id' => '5'],
            ['doctor_id' => '34', 'service_id' => '5'],
            ['doctor_id' => '18', 'service_id' => '5'],
            ['doctor_id' => '5', 'service_id' => '6'],
            ['doctor_id' => '44', 'service_id' => '6'],
            ['doctor_id' => '22', 'service_id' => '7'],
            ['doctor_id' => '30', 'service_id' => '8'],
            ['doctor_id' => '36', 'service_id' => '8'],
            ['doctor_id' => '41', 'service_id' => '8'],
            ['doctor_id' => '25', 'service_id' => '8'],
            ['doctor_id' => '25', 'service_id' => '10'],
            ['doctor_id' => '30', 'service_id' => '10'],
            ['doctor_id' => '33', 'service_id' => '9'],
            ['doctor_id' => '10', 'service_id' => '11'],
            ['doctor_id' => '25', 'service_id' => '11'],
            ['doctor_id' => '12', 'service_id' => '11'],
            ['doctor_id' => '28', 'service_id' => '12'],
            ['doctor_id' => '13', 'service_id' => '13'],
            ['doctor_id' => '22', 'service_id' => '14'],
            ['doctor_id' => '19', 'service_id' => '15'],
            ['doctor_id' => '31', 'service_id' => '15'],
            ['doctor_id' => '18', 'service_id' => '15'],
            ['doctor_id' => '40', 'service_id' => '16'],
            ['doctor_id' => '27', 'service_id' => '16'],
            ['doctor_id' => '25', 'service_id' => '16'],
            ['doctor_id' => '12', 'service_id' => '16'],
            ['doctor_id' => '8', 'service_id' => '17'],
            ['doctor_id' => '2', 'service_id' => '20'],
            ['doctor_id' => '15', 'service_id' => '20'],
        ]);
    }
}
