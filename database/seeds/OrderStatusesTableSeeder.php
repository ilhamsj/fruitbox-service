<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/seeds/json/6_statuses.json");
        $datas = json_decode($json);

        foreach($datas as $data) {
            App\Models\OrderStatus::firstOrCreate([
                'name' => $data->name,
                'type' => $data->type,
            ]);
        }
    }
}
