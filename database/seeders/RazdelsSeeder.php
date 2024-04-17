<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RazdelsSeeder extends Seeder
{
    public function run()
    {
        DB::table('razdels')->insert([
            ['id' => '1', 'razdel_title' => 'Взрослое отделение', 'razdel_alias' => 'adult', 'razdel_images' => 'home/vzrosloe_otdelenie.svg'],
            ['id' => '2', 'razdel_title' => 'Детское отделение', 'razdel_alias' => 'children', 'razdel_images' => 'home/detskoe_otdelenie.svg'],
            ['id' => '3', 'razdel_title' => 'Лаборатория', 'razdel_alias' => 'laboratoria', 'razdel_images' => 'home/laboratoria.svg'],
            ['id' => '4', 'razdel_title' => 'Дневной стационар', 'razdel_alias' => 'days-clinic', 'razdel_images' => 'home/stacionar.svg'],
        ]);
    }
}
