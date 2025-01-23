<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GuestHouse;

class GuestHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guestHouses = [
            [
                'name' => 'Алпийски уют',
                'type' => 'Къща',
                'single_beds' => 3,
                'double_beds' => 2,
                'price_per_night' => 80,
                'hasPool' => true,
                'hasInternet' => true,
                'rating' => 5,
                'location_id' => 1, // ID за Банско
            ],
            [
                'name' => 'Снежна долина',
                'type' => 'Вила',
                'single_beds' => 4,
                'double_beds' => 3,
                'price_per_night' => 90,
                'hasPool' => false,
                'hasInternet' => true,
                'rating' => 4,
                'location_id' => 2, // ID за Пампорово
            ],
            [
                'name' => 'Лесен рай',
                'type' => 'Хижа',
                'single_beds' => 2,
                'double_beds' => 1,
                'price_per_night' => 75,
                'hasPool' => true,
                'hasInternet' => false,
                'rating' => 4,
                'location_id' => 3, // ID за Боровец
            ],
            [
                'name' => 'Тревна къща',
                'type' => 'Къща',
                'single_beds' => 5,
                'double_beds' => 4,
                'price_per_night' => 100,
                'hasPool' => true,
                'hasInternet' => true,
                'rating' => 5,
                'location_id' => 4, // ID за Трявна
            ],
            [
                'name' => 'СПА оазис',
                'type' => 'Вила',
                'single_beds' => 3,
                'double_beds' => 2,
                'price_per_night' => 120,
                'hasPool' => true,
                'hasInternet' => true,
                'rating' => 5,
                'location_id' => 5, // ID за Велинград
            ],
            [
                'name' => 'Хисарска идилия',
                'type' => 'Хижа',
                'single_beds' => 4,
                'double_beds' => 2,
                'price_per_night' => 110,
                'hasPool' => false,
                'hasInternet' => true,
                'rating' => 4,
                'location_id' => 6, // ID за Хисаря
            ],
            [
                'name' => 'Горски кът',
                'type' => 'Къща',
                'single_beds' => 2,
                'double_beds' => 3,
                'price_per_night' => 85,
                'hasPool' => true,
                'hasInternet' => true,
                'rating' => 4,
                'location_id' => 7, // ID за Девин
            ],
            [
                'name' => 'Морски бряг',
                'type' => 'Вила',
                'single_beds' => 3,
                'double_beds' => 1,
                'price_per_night' => 95,
                'hasPool' => false,
                'hasInternet' => true,
                'rating' => 4,
                'location_id' => 8, // ID за Балчик
            ],
            [
                'name' => 'Слънчев залез',
                'type' => 'Хижа',
                'single_beds' => 2,
                'double_beds' => 2,
                'price_per_night' => 80,
                'hasPool' => true,
                'hasInternet' => false,
                'rating' => 3,
                'location_id' => 9, // ID за Ахтопол
            ],
            [
                'name' => 'Романс',
                'type' => 'Къща',
                'single_beds' => 3,
                'double_beds' => 3,
                'price_per_night' => 100,
                'hasPool' => true,
                'hasInternet' => true,
                'rating' => 4,
                'location_id' => 1, // ID за Банско
            ],
            [
                'name' => 'Алпийски уют',
                'type' => 'Вила',
                'single_beds' => 4,
                'double_beds' => 1,
                'price_per_night' => 85,
                'hasPool' => false,
                'hasInternet' => false,
                'rating' => 3,
                'location_id' => 2, // ID за Пампорово
            ],
            [
                'name' => 'Еко къща',
                'type' => 'Хижа',
                'single_beds' => 2,
                'double_beds' => 3,
                'price_per_night' => 70,
                'hasPool' => true,
                'hasInternet' => true,
                'rating' => 4,
                'location_id' => 3, // ID за Боровец
            ],
            [
                'name' => 'Скритото място',
                'type' => 'Къща',
                'single_beds' => 5,
                'double_beds' => 2,
                'price_per_night' => 95,
                'hasPool' => true,
                'hasInternet' => true,
                'rating' => 5,
                'location_id' => 4, // ID за Трявна
            ],
            [
                'name' => 'СПА великолепие',
                'type' => 'Вила',
                'single_beds' => 3,
                'double_beds' => 4,
                'price_per_night' => 130,
                'hasPool' => true,
                'hasInternet' => true,
                'rating' => 5,
                'location_id' => 5, // ID за Велинград
            ],
            [
                'name' => 'Тихото кътче',
                'type' => 'Хижа',
                'single_beds' => 4,
                'double_beds' => 3,
                'price_per_night' => 115,
                'hasPool' => false,
                'hasInternet' => true,
                'rating' => 4,
                'location_id' => 6, // ID за Хисаря
            ],
            [
                'name' => 'Девинска приказка',
                'type' => 'Къща',
                'single_beds' => 2,
                'double_beds' => 1,
                'price_per_night' => 90,
                'hasPool' => true,
                'hasInternet' => false,
                'rating' => 4,
                'location_id' => 7, // ID за Девин
            ],
            [
                'name' => 'Морски уют',
                'type' => 'Вила',
                'single_beds' => 3,
                'double_beds' => 3,
                'price_per_night' => 110,
                'hasPool' => true,
                'hasInternet' => true,
                'rating' => 5,
                'location_id' => 8, // ID за Балчик
            ],
            [
                'name' => 'Бриз',
                'type' => 'Хижа',
                'single_beds' => 4,
                'double_beds' => 1,
                'price_per_night' => 85,
                'hasPool' => false,
                'hasInternet' => true,
                'rating' => 3,
                'location_id' => 9, // ID за Ахтопол
            ]
        ];
        foreach ($guestHouses as $guestHouse) {
            GuestHouse::create($guestHouse);
        }
    }
}
