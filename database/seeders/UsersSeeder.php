<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'admin',
                'email' => 'admin@admin',
                'email_verified_at' => '',
                'password' => '$2y$12$f4dBsKmWi8Vdw91FDdwDI.NeQY/z7YTfFst2gPhM1A457kjVyHJbe',
                'remember_token' => '8uitwfheECkDPYHEDavk6QhlplGEWAl2CCm1EbR21CcjE3S1ZM0MpASuNHB5',
                'created_at' => '2024-03-22T15:39:39',
                'updated_at' => '2024-03-22T15:39:39',
            ],
           ]);
    }
}
