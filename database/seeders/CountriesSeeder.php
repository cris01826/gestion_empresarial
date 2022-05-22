<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name_country' => 'Colombia',
        ]);
        DB::table('countries')->insert([
            'name_country' => 'Ecuador',
        ]);
        DB::table('countries')->insert([
            'name_country' => 'Venezuela',
        ]);
        DB::table('countries')->insert([
            'name_country' => 'Perú',
        ]);
    }
}
