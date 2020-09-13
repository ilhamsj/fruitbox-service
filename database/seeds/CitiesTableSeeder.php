<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/seeds/json/3_cities.json");
        $datas = json_decode($json);

        foreach($datas as $data) {
            App\Models\City::firstOrCreate([
                'id' => $data->id,
                'province_id' => $data->id_provinsi,
                'name' => $data->nama,
            ]);
        }
    }
}
