<?php

use Illuminate\Database\Seeder;
use App\Department;


class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Department::create(['id' => 5, 'name' => 'ANTIOQUIA']);
            Department::create(['id' => 8, 'name' => 'ATLÁNTICO']);
            Department::create(['id' => 11, 'name' => 'BOGOTÁ, D.C.']);
            Department::create(['id' => 13, 'name' => 'BOLÍVAR']);
            Department::create(['id' => 15, 'name' => 'BOYACÁ']);
            Department::create(['id' => 17, 'name' => 'CALDAS']);
            Department::create(['id' => 18, 'name' => 'CAQUETÁ']);
            Department::create(['id' => 19, 'name' => 'CAUCA']);
            Department::create(['id' => 20, 'name' => 'CESAR']);
            Department::create(['id' => 23, 'name' => 'CÓRDOBA']);
            Department::create(['id' => 25, 'name' => 'CUNDINAMARCA']);
            Department::create(['id' => 27, 'name' => 'CHOCÓ']);
            Department::create(['id' => 41, 'name' => 'HUILA']);
            Department::create(['id' => 44, 'name' => 'LA GUAJIRA']);
            Department::create(['id' => 47, 'name' => 'MAGDALENA']);
            Department::create(['id' => 50, 'name' => 'META']);
            Department::create(['id' => 52, 'name' => 'NARIÑO']);
            Department::create(['id' => 54, 'name' => 'NORTE DE SANTANDER']);
            Department::create(['id' => 63, 'name' => 'QUINDÍO']);
            Department::create(['id' => 66, 'name' => 'RISARALDA']);
            Department::create(['id' => 68, 'name' => 'SANTANDER']);
            Department::create(['id' => 70, 'name' => 'SUCRE']);
            Department::create(['id' => 73, 'name' => 'TOLIMA']);
            Department::create(['id' => 76, 'name' => 'VALLE DEL CAUCA']);
            Department::create(['id' => 81, 'name' => 'ARAUCA']);
            Department::create(['id' => 85, 'name' => 'CASANARE']);
            Department::create(['id' => 86, 'name' => 'PUTUMAYO']);
            Department::create(['id' => 88, 'name' => 'ARCHIPIÉLAGO DE SAN ANDRÉS, PROVIDENCIA Y SANTA CATALINA']);
            Department::create(['id' => 91, 'name' => 'AMAZONAS']);
            Department::create(['id' => 94, 'name' => 'GUAINÍA']);
            Department::create(['id' => 95, 'name' => 'GUAVIARE']);
            Department::create(['id' => 97, 'name' => 'VAUPÉS']);
            Department::create(['id' => 99, 'name' => 'VICHADA']);
    }
}
