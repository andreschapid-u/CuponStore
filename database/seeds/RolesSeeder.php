<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Product;
use App\Category;
use App\Brand;
use App\Branch;
use App\Company;
use App\Person;
use App\City;
use App\BranchProduct;



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
        $person = Person::create([
            'first_name' => 'Carlos',
            'last_name' => 'Chapid',
            'shipping_email' => 'correo',
            'role_id' =>  Role::first()->id
        ]);
        $b = Brand::create(['name'=>'Adidas']);
        $c = Category::create(['name'=>'Tegnologia']);
        $product = Product::create(['name'=>'p1','image'=>'img', 'brand_id' => $b->id, 'category_id' => $c->id]);
        $com = Company::create(['name'=> 'Empresa 1', 'nit' => 1233, 'image' => 'iiiii', 'image_s' => 'iiiii',
            'person_id' => $person->id
        ]);

        $city = City::first();
        // dd($city);
        $sucursal = Branch::create([
            'address' => '123456sdfg',
            'telephone' => '2345671',
            'company_id' => $com->id,
            'person_id' =>  Person::first()->id,
            'city_id' => $city->id
        ]);

        Branch::create([
            'address' => 'Dir1',
            'telephone' => '123456789',
            'company_id' => 1,
            'person_id' =>  Person::first()->id,
            'city_id' => $city->id
        ]);

        BranchProduct::create([
            'branch_id' => $sucursal->id,
            'product_id' => $product->id
        ]);
    }
}
