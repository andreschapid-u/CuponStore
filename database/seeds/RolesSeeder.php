<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrador']);
        // Administrador del Sistema - CuponStore

        Role::create(['name' => 'Empresario']);
        // El dueño de una empresa, con el se negocia primeramente

        Role::create(['name' => 'Publicista']);
        // Encargado de gestionar los productos y cupones

        Role::create(['name' => 'Registrado']);
        // Cliente con cuenta de usuario creada

        Role::create(['name' => 'Cliente']);
        // Cliente de paso

        Role::create(['name' => 'Checker']);
        // Persona encargada de redimir los cupones, pertenece a una sucursal de una empresa

    }
}
