<?php

use Illuminate\Database\Seeder;
use App\Aula;
class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Aula::insert([
            [
                "descripcion" => "cubiculo",
                "local_id" => "1",
            ],
            [
                "descripcion" => "seminario",
                "local_id" => "1",
            ],
            [
                "descripcion" => "lab 01",
                "local_id" => "1",
            ],
            [
                "descripcion" => "lab 02",
                "local_id" => "1",
            ],
            [
                "descripcion" => "lab 03",
                "local_id" => "1",
            ],
            [
                "descripcion" => "I4",
                "local_id" => "1",
            ],
            [
                "descripcion" => "I5",
                "local_id" => "1",
            ],
        ]);
    }
}
