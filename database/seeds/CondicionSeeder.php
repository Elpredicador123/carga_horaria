<?php

use Illuminate\Database\Seeder;
use App\Condicion;
class CondicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Condicion::insert([
            [
                "descripcion" => "nombrado",
            ],
            [
                "descripcion" => "contratado",
            ],
            [
                "descripcion" => "extraordinario",
            ],
        ]);
    }
}
