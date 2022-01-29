<?php

use Illuminate\Database\Seeder;
use App\Jefedepartamento;
class JefedepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jefedepartamento::insert([
            [
                "escuela_id" => "1",
                "user_id" => "2",
            ],
        ]);
    }
}
