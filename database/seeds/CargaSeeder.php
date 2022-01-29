<?php

use Illuminate\Database\Seeder;
use App\Carga;
class CargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carga::insert([
            [
                "titulo"=>"PREPARACION Y EVALUACION",
                "descripcion" => "(Max 50% de Trabajo Lectivo).",
            ],
            [
                "titulo"=>"CONSEJERIA Y TUTORIA",
                "descripcion" => "Señalar número de alumnos y el ciclo acádemico con los que se desarrolla. (Como minimo 01 horas semanal).",
            ],
            [
                "titulo"=>"INVESTIGACION",
                "descripcion" => "Consignar numero de inscripción, código, nombre y duración del proyecto. (Como minimo 04 y 05 horas semanales, segun modalidad de docentes ordinarios).",
            ],
            [
                "titulo"=>"CAPACITACION",
                "descripcion" => "Señale lo referente a este rubro en el marco de los planes de cada Facultad (como máximo 05 semanales).",
            ],
            [
                "titulo"=>"ACTIVIDADES DE GOBIERNO",
                "descripcion" => "Si desempeña cargo indique.",
            ],
            [
                "titulo"=>"ACTIVIDADES DE ADMINISTRACION",
                "descripcion" => "Si desempeña cargo indique.",
            ],
            [
                "titulo"=>"ASESORIA DE TESIS, EXAMENES PROFESIONALES Y EXPERIENCIA PROFESIONAL",
                "descripcion" => "Indicar el número de Resolución Decanal, precisando el nombre y duración de la actividad programada.",
            ],
            [
                "titulo"=>"RESPONSABILIDAD SOCIAL UNIVERSITARIA",
                "descripcion" => "Señalar actividad, proyecto programa a ejecutarse n beneficio de la comunidad local o regional. (Como máximo 02 horas semanales).",
            ],
            [
                "titulo"=>"COMITES TECNICOS Y COMISIONES",
                "descripcion" => "Consignar el número de Resolución autoritativa indicando el lapso de vigencia.",
            ],
        ]);
    }
}
