<?php

namespace Database\Seeders;

use App\Models\TheatreHall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TheatreHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //THEATRE HALL CREATE
        $hall = 1;
        while ($hall <= 8) {
            TheatreHall::create([
                'name' => 'Salon ' . $hall
            ]);
            $hall++;
        }
    }
}
