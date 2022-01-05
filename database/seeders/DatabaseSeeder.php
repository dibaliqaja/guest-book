<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory([
            'name' => 'Administrator',
            'email' => 'admin@email.com'
        ])->create();

        $provinces = Http::get('https://d.kapanlaginetwork.com/banner/test/province.json');  
    	$data_province = $provinces->json();

        foreach($data_province as $value)
        {
            Province::create([
                'code' => $value['kode'],
                'name' => $value['nama']
            ]);
        }

        $cities = Http::get('https://d.kapanlaginetwork.com/banner/test/city.json');  
    	$data_city = $cities->json();

        foreach($data_city as $value)
        {
            City::create([
                'code' => $value['kode'],
                'name' => $value['nama']
            ]);
        }
    }
}
