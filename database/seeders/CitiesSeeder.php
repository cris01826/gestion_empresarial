<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = ["Leticia", "Medellín", "Arauca", "Barranquilla", "Bogotá", "Cartagena", "Tunja", "Manizales", "Florencia", "Yopal", "Popayán", "Valledupar", "Quibdó", "Montería", "Bogotá", "Inírida", "San José del Guaviare", "Neiva", "Riohacha", "Santa Marta", "Villavicencio", "Pasto", "San José de Cúcuta", "Mocoa", "Armenia", "Pereira", "San Andrés", "Bucaramanga", "Sincelejo", "Ibagué", "Cali", "Mitú", "Puerto Carreño"];
        for ($i = 0; $i <= 32; $i++) {
        DB::table('cities')->insert([
            'name_city' => $cities[$i],
            'id_department' => $i+1,
        ]);
    }
    }
}
