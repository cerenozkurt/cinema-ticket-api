<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        //iptal ettim, yine de kalsın
        //SESSION CREATE
        // $number = 10;
        // while ($number < 21) {
        //     Sessions::create([
        //         'time' => $number . ':' . '00',
        //     ]);

        //     Sessions::create([
        //         'time' => $number . ':' . '15',
        //     ]);

        //     Sessions::create([
        //         'time' => $number . ':' . '30',
        //     ]);

        //     Sessions::create([
        //         'time' => $number . ':' . '45',
        //     ]);

        //     $number++;
        // }
        // Sessions::create([
        //     'time' => '21:00',
        // ]);

        $this->call([
            MovieSeeder::class,
            PaymentSeeder::class,
            SeatsSeeder::class,
            TheatreHallSeeder::class
        ]);


        
    }
}
