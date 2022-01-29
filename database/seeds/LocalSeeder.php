<?php

use Illuminate\Database\Seeder;
use App\Local;
class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Local::insert([
            [
                "descripcion" => "ciud unv",
            ], 
            [
                "descripcion" => "vall jeq",
            ], 
        ]);
    }
}
