<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::create([
            'title' => 'Student',
            'price' => 30,
        ]);
        Payment::create([
            'title' => 'Adult',
            'price' => 50,
        ]);
    }
}
