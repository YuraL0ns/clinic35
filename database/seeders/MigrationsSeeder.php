<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationsSeeder extends Seeder
{
    public function run()
    {
        DB::table('migrations')->insert([
            ['id' => '1', 'migration' => '2014_10_12_000000_create_users_table', 'batch' => '1'],
            ['id' => '2', 'migration' => '2014_10_12_100000_create_password_reset_tokens_table', 'batch' => '1'],
            ['id' => '3', 'migration' => '2014_10_12_100000_create_password_resets_table', 'batch' => '1'],
            ['id' => '4', 'migration' => '2019_08_19_000000_create_failed_jobs_table', 'batch' => '1'],
            ['id' => '5', 'migration' => '2019_12_14_000001_create_personal_access_tokens_table', 'batch' => '1'],
            ['id' => '6', 'migration' => '2024_01_25_194016_create_posts_table', 'batch' => '1'],
            ['id' => '7', 'migration' => '2024_01_28_080435_create_razdels_table', 'batch' => '1'],
            ['id' => '8', 'migration' => '2024_01_28_080436_create_doctors_table', 'batch' => '1'],
            ['id' => '9', 'migration' => '2024_01_28_080436_create_services_table', 'batch' => '1'],
            ['id' => '10', 'migration' => '2024_01_28_081603_create_doctor_service_table', 'batch' => '1'],
            ['id' => '11', 'migration' => '2024_02_18_122905_create_sales_table', 'batch' => '1'],
            ['id' => '12', 'migration' => '2024_02_18_141054_create_price_table', 'batch' => '1'],
            ['id' => '13', 'migration' => '2024_02_22_184244_create_points_table', 'batch' => '1'],
            ['id' => '14', 'migration' => '2024_02_22_184733_create_point_service_table', 'batch' => '1'],
            ['id' => '15', 'migration' => '2024_02_26_210411_add_columns_to_services', 'batch' => '1'],
            ['id' => '16', 'migration' => '2024_02_29_163024_add_visible_doctors_table', 'batch' => '1'],
            ['id' => '17', 'migration' => '2024_03_19_183711_create_message_ff_table', 'batch' => '1'],
            ['id' => '18', 'migration' => '2024_03_19_190622_create_message_fh_table', 'batch' => '1'],
            ['id' => '19', 'migration' => '2024_03_21_215805_add_columns_to_doctors', 'batch' => '2'],
            ['id' => '20', 'migration' => '2024_03_21_220022_add_columns_to_services', 'batch' => '2'],
            ['id' => '21', 'migration' => '2024_03_21_220105_add_column_to_sales', 'batch' => '2'],
            ['id' => '22', 'migration' => '2024_03_22_075100_add_columns_to_users', 'batch' => '2'],
            ['id' => '23', 'migration' => '2024_03_27_100303_add_titleseo_to_doctors', 'batch' => '3'],
            ['id' => '24', 'migration' => '2024_03_27_100312_add_titleseo_to_sales', 'batch' => '3'],
            ['id' => '25', 'migration' => '2024_03_27_100323_add_titleseo_to_services', 'batch' => '3'],
        ]);
    }
}
