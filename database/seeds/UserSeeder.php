<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ROL
        //1 -> administrador
        //2 -> jefe departamento
        //3 -> docente

        User::insert([
            [
                "name" => "administrador 01",
                "dni" => "78946251",
                "email" => "a1@unitru.edu.pe",
                "rol_id" => "1",
                "password" => \Hash::make('12345678'),
            ],
            [
                "name" => "jefe departamento 01",
                "dni" => "93615784",
                "email" => "jd1@unitru.edu.pe",
                "rol_id" => "2",
                "password" => \Hash::make('12345678'),
            ],
            [
                "name" => "docente 01",
                "dni" => "70415854",
                "email" => "d1@unitru.edu.pe",
                "rol_id" => "3",
                "password" => \Hash::make('12345678'),
            ],
            [
                "name" => "Jose Gomez Avila",
                "dni" => "76849135",
                "email" => "d2@unitru.edu.pe",
                "rol_id" => "3",
                "password" => \Hash::make('12345678'),
            ],
        ]);
    }
}
