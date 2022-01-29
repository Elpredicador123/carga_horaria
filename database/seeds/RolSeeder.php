<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::insert([
            [
                "descripcion" => "administrador",
            ],
            [
                "descripcion" => "jefe departamento",
            ],
            [
                "descripcion" => "docente",
            ],
        ]);
    }
}
