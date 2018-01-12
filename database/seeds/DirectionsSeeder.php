<?php

use Illuminate\Database\Seeder;
use App\Direction;

class DirectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['title' => 'QA Тестировщики',],
            ['title' => 'Android-Разработчики',],
            ['title' => 'IOS-Разработчики',],
            ['title' => 'Fronted-Разработчики',],
            ['title' => 'Backend-Разработчики',],
        ];
        Direction::insert($data);
    }
}