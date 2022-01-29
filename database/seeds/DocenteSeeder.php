<?php

use Illuminate\Database\Seeder;
use App\Docente;
class DocenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Docente::insert([
            [
                "escuela_id" => "1",
                "user_id" => "3",
                "condicion_id" => "1",
                "categoria_id" => "3",
                "modalidad_id" => "1",
            ],
        ]);
    }
}
