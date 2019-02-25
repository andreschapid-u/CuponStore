<?php

use Illuminate\Database\Seeder;
use App\Departamento;


class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Departamento::create(['id' => 5, 'nombre' => 'ANTIOQUIA']);
            Departamento::create(['id' => 8, 'nombre' => 'ATLÁNTICO']);
            Departamento::create(['id' => 11, 'nombre' => 'BOGOTÁ, D.C.']);
            Departamento::create(['id' => 13, 'nombre' => 'BOLÍVAR']);
            Departamento::create(['id' => 15, 'nombre' => 'BOYACÁ']);
            Departamento::create(['id' => 17, 'nombre' => 'CALDAS']);
            Departamento::create(['id' => 18, 'nombre' => 'CAQUETÁ']);
            Departamento::create(['id' => 19, 'nombre' => 'CAUCA']);
            Departamento::create(['id' => 20, 'nombre' => 'CESAR']);
            Departamento::create(['id' => 23, 'nombre' => 'CÓRDOBA']);
            Departamento::create(['id' => 25, 'nombre' => 'CUNDINAMARCA']);
            Departamento::create(['id' => 27, 'nombre' => 'CHOCÓ']);
            Departamento::create(['id' => 41, 'nombre' => 'HUILA']);
            Departamento::create(['id' => 44, 'nombre' => 'LA GUAJIRA']);
            Departamento::create(['id' => 47, 'nombre' => 'MAGDALENA']);
            Departamento::create(['id' => 50, 'nombre' => 'META']);
            Departamento::create(['id' => 52, 'nombre' => 'NARIÑO']);
            Departamento::create(['id' => 54, 'nombre' => 'NORTE DE SANTANDER']);
            Departamento::create(['id' => 63, 'nombre' => 'QUINDIO']);
            Departamento::create(['id' => 66, 'nombre' => 'RISARALDA']);
            Departamento::create(['id' => 68, 'nombre' => 'SANTANDER']);
            Departamento::create(['id' => 70, 'nombre' => 'SUCRE']);
            Departamento::create(['id' => 73, 'nombre' => 'TOLIMA']);
            Departamento::create(['id' => 76, 'nombre' => 'VALLE DEL CAUCA']);
            Departamento::create(['id' => 81, 'nombre' => 'ARAUCA']);
            Departamento::create(['id' => 85, 'nombre' => 'CASANARE']);
            Departamento::create(['id' => 86, 'nombre' => 'PUTUMAYO']);
            Departamento::create(['id' => 88, 'nombre' => 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA']);
            Departamento::create(['id' => 91, 'nombre' => 'AMAZONAS']);
            Departamento::create(['id' => 94, 'nombre' => 'GUAINÍA']);
            Departamento::create(['id' => 95, 'nombre' => 'GUAVIARE']);
            Departamento::create(['id' => 97, 'nombre' => 'VAUPÉS']);
            Departamento::create(['id' => 99, 'nombre' => 'VICHADA']);
    }
}
