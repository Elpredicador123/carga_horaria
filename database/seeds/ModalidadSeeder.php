<?php

use Illuminate\Database\Seeder;
use App\Modalidad;
class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidad::insert([
            [
                "descripcion" => "tiempo completo",
                "horas" => 40
            ],
            [
                "descripcion" => "medio tiempo",
                "horas" => 20
            ],
        ]);
    }
}
