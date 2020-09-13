<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/seeds/json/4_districts.json");
        $datas = json_decode($json);

        foreach($datas as $data) {
            App\Models\District::firstOrCreate([
                'id' => $data->id,
                'city_id' => $data->id_kota,
                'name' => $data->nama,
            ]);
        }
    }
}
