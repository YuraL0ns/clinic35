<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'role_name' => 'Администратор',
            'role_icon' => 'fa-crown',
            'role_color' => 'warning',
            'role_exp' => '100',
        ]);

        DB::table('role_user')->insert([
            'role_id' => '1',
            'user_id' => '1',
        ]);
    }
}
