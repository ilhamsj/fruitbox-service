<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/seeds/json/2_provinces.json");
        $datas = json_decode($json);

        foreach($datas as $data) {
            App\Models\Province::firstOrCreate([
                'id' => $data->id,
                'country_id' => 102,
                'name' => $data->nama,
            ]);
        }
    }
}
