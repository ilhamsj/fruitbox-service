<?php

use Illuminate\Database\Seeder;
use App\Models\Country;
use Illuminate\Support\Facades\File;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/seeds/json/1_countries.json");
        $datas = json_decode($json);

        foreach($datas as $data) {
            Country::firstOrCreate([
                'id' => $data->id,
                'name' => $data->name,
                'iso2' => $data->iso2,
                'iso3' => $data->iso3,
                'capital' => $data->capital,
                'currency' => $data->currency,
                'phone_code' => $data->phone_code
            ]);
        }
    }
}
