<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VillageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/seeds/json/5_villages.json");
        $datas = json_decode($json);

        foreach($datas as $data) {
            App\Models\Village::firstOrCreate([
                'id' => $data->id,
                'district_id' => $data->id_kecamatan,
                'name' => $data->nama,
            ]);
        }
    }
}
