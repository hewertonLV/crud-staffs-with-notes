<?php

use Illuminate\Database\Seeder;
use App\Unidade;
use App\Colaborador;
use App\Cargo;
use App\CargoColaborador;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(Unidade::class, 150)->create();
        factory(Colaborador::class, 200)->create();
        factory(Cargo::class, 10)->create();
        $QuantColaborator = CargoColaborador::getCheckStaffWithoutJob()->count();
        $i = 0;
        while ($i < $QuantColaborator) {
            factory(CargoColaborador::class)->create();
            $i++;
        }
//        $this->call(UsersTableSeeder::class);
    }
}
