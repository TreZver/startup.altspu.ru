<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ThematicDirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mass = [
            'Мультимедийные технологии'
           ,'Интеллектуальные робототехнические системы'
           ,'Беспилотные воздушные суда и анализ геопространственных данных'
        ];
        foreach ($mass as $value) {
            \App\Models\ThematicDirection::create([
                'title' => $value
            ]);
        }
    }
}
