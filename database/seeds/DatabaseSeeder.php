<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        // $this->call(PostsTableSeeder::class);

        // $this->call(CountriesTableSeeder::class);
        // $this->call(ProvincesTableSeeder::class);
        // $this->call(CitiesTableSeeder::class);
        // $this->call(DistrictTableSeeder::class);
        // $this->call(VillageTableSeeder::class);

        // $this->call(BrandsTableSeeder::class);
        // $this->call(MerchantsTableSeeder::class);
        // $this->call(StoresTableSeeder::class);
        // $this->call(CategoriesTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        // $this->call(StocksTableSeeder::class);

        // $this->call(UserAddressesTableSeeder::class);
        
        // $this->call(OrderStatusesTableSeeder::class);
        // $this->call(OrdersTableSeeder::class);
        // $this->call(OrderItemsTableSeeder::class);
    }
}
