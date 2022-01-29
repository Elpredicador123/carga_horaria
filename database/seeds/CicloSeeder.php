<?php

use Illuminate\Database\Seeder;
use App\Ciclo;
class CicloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciclo::insert([
            [
                "descripcion" => "1",
                "tipo" => "impar"
            ], 
            [
                "descripcion" => "2",
                "tipo" => "par"
            ], 
            [
                "descripcion" => "3",
                "tipo" => "impar"
            ], 
            [
                "descripcion" => "4",
                "tipo" => "par"
            ], 
            [
                "descripcion" => "5",
                "tipo" => "impar"
            ], 
            [
                "descripcion" => "6",
                "tipo" => "par"
            ], 
            [
                "descripcion" => "7",
                "tipo" => "impar"
            ], 
            [
                "descripcion" => "8",
                "tipo" => "par"
            ], 
            [
                "descripcion" => "9",
                "tipo" => "impar"
            ], 
            [
                "descripcion" => "10",
                "tipo" => "par"
            ], 
        ]);
    }
}
