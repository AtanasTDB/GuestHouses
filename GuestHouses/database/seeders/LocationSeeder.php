<?php

namespace Database\Seeders;

use App\Models\GuestHouseLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $locations = [
            [
                'name' => 'Банско',
                'type' => 'Планински туризъм'
            ],
            [
                'name' => 'Пампорово',
                'type' => 'Планински туризъм'
            ],
            [
                'name' => 'Боровец',
                'type' => 'Планински туризъм'
            ],
            [
                'name' => 'Трявна',
                'type' => 'Планински туризъм'
            ],
            [
                'name' => 'Велинград',
                'type' => 'СПА туризъм'
            ],
            [
                'name' => 'Хисаря',
                'type' => 'СПА туризъм'
            ],
            [
                'name' => 'Девин',
                'type' => 'СПА туризъм'
            ],
            [
                'name' => 'Балчик',
                'type' => 'Морски туризъм'
            ],
            [
                'name' => 'Ахтопол',
                'type' => 'Морски туризъм'
            ],
        ];

        foreach($locations as $location){
            GuestHouseLocation::create($location);
        }
    }
}
