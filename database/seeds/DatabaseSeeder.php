<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(CondicionSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ModalidadSeeder::class);
        $this->call(CargaSeeder::class);
        $this->call(LocalSeeder::class);
        $this->call(SeccionSeeder::class);
        $this->call(CicloSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(FacultadSeeder::class);
        $this->call(PeriodoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AulaSeeder::class);
        $this->call(EscuelaSeeder::class);
        $this->call(DocenteSeeder::class);
        $this->call(JefedepartamentoSeeder::class);
    }
}
