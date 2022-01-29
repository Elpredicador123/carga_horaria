<?php

use Illuminate\Database\Seeder;
use App\Escuela;
class EscuelaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Escuela::insert([
            [
                "descripcion" => "sistemas",
                "facultad_id" => "1",
            ],
            [
                "descripcion" => "industrial",
                "facultad_id" => "1",
            ],
            [
                "descripcion" => "ambiental",
                "facultad_id" => "1",
            ],
            [
                "descripcion" => "agroindustrial",
                "facultad_id" => "1",
            ],
            [
                "descripcion" => "minas",
                "facultad_id" => "1",
            ],
            [
                "descripcion" => "mecanica",
                "facultad_id" => "1",
            ],
            [
                "descripcion" => "mecatronica",
                "facultad_id" => "1",
            ],
        ]);
    }
}
