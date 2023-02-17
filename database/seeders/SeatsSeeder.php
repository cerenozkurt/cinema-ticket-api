<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raws = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K'];

        foreach ((object)$raws as $raw) {
            $number = 1;
            while ($number <= 16) {
                Seat::create([
                    'raw' => $raw,
                    'number' => $number
                ]);
                $number++;
            }
        }
    }
}
