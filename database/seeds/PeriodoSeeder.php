<?php

use Illuminate\Database\Seeder;
use App\Periodo;
class PeriodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Periodo::insert([
            [
                "descripcion" => "2021-I",
                "inicio_periodo" => "2021/05/10",
                "fin_periodo" => "2021/08/27",
                "tipo" => "impar"
            ],
            [
                "descripcion" => "2021-II",
                "inicio_periodo" => "2021/09/10",
                "fin_periodo" => "2022/01/27",
                "tipo" => "par"
            ],
            [
                "descripcion" => "2022-I",
                "inicio_periodo" => "2022/05/09",
                "fin_periodo" => "2022/08/26",
                "tipo" => "impar"
            ],
            [
                "descripcion" => "2022-II",
                "inicio_periodo" => "2022/09/12",
                "fin_periodo" => "2022/12/30",
                "tipo" => "par"
            ],
        ]);
    }
}
