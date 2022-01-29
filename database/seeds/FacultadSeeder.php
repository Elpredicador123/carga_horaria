<?php

use Illuminate\Database\Seeder;
use App\Facultad;
class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facultad::insert([
            [
                "descripcion" => "ingenieria",
            ],
            [
                "descripcion" => "ciencias economicas",
            ],
            [
                "descripcion" => "enfermeria",
            ],
            [
                "descripcion" => "medicina",
            ],
            [
                "descripcion" => "ingenieria y arquitectura",
            ],
            [
                "descripcion" => "derecho y ciencias politicas",
            ],
            [
                "descripcion" => "ingenieria quimica",
            ],
            [
                "descripcion" => "educacion y ciencias de la comunicacion",
            ],
            [
                "descripcion" => "ciencias biologicas",
            ],
            [
                "descripcion" => "zootecnia",
            ],
            [
                "descripcion" => "ciencias agropecuarias",
            ],
            [
                "descripcion" => "farmacia y bioquimica",
            ],
        ]);
    }
}
