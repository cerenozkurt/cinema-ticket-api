<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Seats;
use App\Models\Sessions;
use App\Models\TheatreHall;
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


        //SEATS CREATE
        $raws = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];

        foreach ((object)$raws as $raw) {
            $number = 1;
            while ($number <= 16) {
                Seats::create([
                    'raw' => $raw,
                    'number' => $number
                ]);
                $number++;
            }
        }


        //SESSION CREATE
        $number = 10;
        while ($number < 21) {
            Sessions::create([
                'time' => $number.':'.'00',
            ]);

            Sessions::create([
                'time' => $number.':'.'15',
            ]);

            Sessions::create([
                'time' => $number.':'.'30',
            ]);

            Sessions::create([
                'time' => $number.':'.'45',
            ]);

            $number++;

        }
        Sessions::create([
            'time' => '21:00',
        ]);

        //THEATRE HALL CREATE
       $hall = 1;
       while($hall <= 8) {
        TheatreHall::create([
            'name' => 'Salon '.$hall
        ]);
        $hall++;

       }
    }
}
