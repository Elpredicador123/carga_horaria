<?php

use Illuminate\Database\Seeder;
use App\Curso;
class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Curso::insert([
            [
                "descripcion" => "INTRODUCCION A LA INGENIERIA DE SISTEMAS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "PROGRAMACION ORIENTADO A OBJETOS I",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "INGENIERIA GRAFICA",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "PROGRAMACION ORIENTADA A OBJETOS II",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "SISTEMICA",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "DISEÑO WEB",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "ESTRUCTURA DE DATOS ORIENTADO A OBJETOS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "PLATAFORMAS TECNOLÓGICAS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "SISTEMAS DIGITALES",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "ARQUITECTURA Y ORGANIZACIÓN DE COMPUTADORAS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "INGENIERIA DE DATOS I",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "SISTEMAS DE INFORMACIÓN",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "TECNOLOGIAS WEB",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "TRANSFORMACIÓN DIGITAL",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "INGENIERÍA DE DATOS II",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "INGENIERÍA DE REQUERIMIENTOS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "SISTEMAS INTELIGENTES",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "SISTEMAS OPERATIVOS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "ADMINISTRACIÓN DE BASE DE DATOS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "GESTIÓN DE SERVICIOS DE TIC",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "INGENIERÍA DEL SOFTWARE I",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "METODOLOGÍA DE LA INVESTIGACIÓN CIENTÍFICA",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "PLANEAMIENTO ESTRATÉGICO DE LA INFORMACIÓN",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "REDES Y COMUNICACIONES I",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "ARQUITECTURA BASADA EN MICROSERVICIOS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "INGENIERÍA DEL SOFTWARE II",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "INTELIGENCIA DE NEGOCIOS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "INTERNET DE LAS COSAS",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "MARKETING Y MEDIOS SOCIALES",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "REDES Y COMUNICACIONES II",
                "tipo" => "OBL",
            ], 
            [
                "descripcion" => "SEGURIDAD DE LA INFORMACIÓN",
                "tipo" => "OBL",
            ], 
        ]);
    }
}
