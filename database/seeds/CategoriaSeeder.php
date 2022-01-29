<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::insert([
            [
                "descripcion" => "principal",
            ],
            [
                "descripcion" => "asociado",
            ],
            [
                "descripcion" => "auxiliar",
            ],
        ]);
    }
}
