<?php

namespace Database\Seeders;

use App\Models\Flight\Flight;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flights = fopen(__DIR__ . '/files/flights.csv', 'r');

        while (($row = fgetcsv($flights)) !== false) {
            $flight = new Flight();
            $flight->code_departure = $row[0];
            $flight->code_arrival = $row[1];
            $flight->price = $row[2];
            $flight->save();
        }
    }
}
