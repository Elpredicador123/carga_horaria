<?php

use Illuminate\Database\Seeder;
use App\Seccion;
class SeccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seccion::insert([
            [
                "descripcion" => "a",
            ], 
            [
                "descripcion" => "b",
            ], 
        ]);
    }
}
