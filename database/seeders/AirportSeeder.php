<?php

namespace Database\Seeders;

use App\Models\Airport\Airport;
use Illuminate\Database\Seeder;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $airports = fopen(__DIR__ . '/files/airports.csv', 'r');

        while (($row = fgetcsv($airports)) !== false) {
            $airport = new Airport();
            $airport->name = $row[0];
            $airport->code = $row[1];
            $airport->lat = $row[2];
            $airport->lng = $row[3];
            $airport->save();
        }
    }
}
