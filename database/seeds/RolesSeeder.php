<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Product;
use App\Category;
use App\Brand;
use App\Branch;
use App\Company;
use App\Person;
use App\City;
use App\BranchProduct;
use App\PaymentMethod;



class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Administrador']); // Administrador del Sistema - CuponStore
        Role::create(['name' => 'Empresario']); // El dueño de una empresa, con el se negocia primeramente
        Role::create(['name' => 'Publicista']); // Encargado de gestionar los productos y cupones
        Role::create(['name' => 'Registrado']); // Cliente con cuenta de usuario creada
        Role::create(['name' => 'Cliente']); // Cliente de paso
        Role::create(['name' => 'Checker']);

        Category::create(['name' => 'TV, Audio y Foto']);
        Category::create(['name' => 'Arte y artesanías']);
        Category::create(['name' => 'Automotriz']);
        Category::create(['name' => 'Juguetes']);
        Category::create(['name' => 'Belleza y cuidado personal']);
        Category::create(['name' => 'Libros']);
        Category::create(['name' => 'Computación']);
        Category::create(['name' => 'Celulares y Tablets']);
        Category::create(['name' => 'Moda']);
        Category::create(['name' => 'Salud y productos para el hogar']);
        Category::create(['name' => 'Hogar y cocina']);
        Category::create(['name' => 'Industrial y científico']);
        Category::create(['name' => 'Equipaje']);
        Category::create(['name' => 'Insumos para mascotas']);
        Category::create(['name' => 'Software']);
        Category::create(['name' => 'Deportes y actividades al aire libre']);
        Category::create(['name' => 'Herramientas y mejoramiento del hogar']);
        Category::create(['name' => 'Juguetes y juegos']);
        Category::create(['name' => 'Consolas y Videojuegos']);
        Category::create(['name' => 'Ventas y ofertas']);
        Category::create(['name' => 'Tecnología']);

        // Administrador
        $person = Person::create([
            'first_name' => 'Carlos',
            'last_name' => 'Chapid',
            'shipping_email' => 'admin@cuponstore.com',
            'role_id' =>  Role::where('name', 'Administrador')->first()->id
        ]);
        $user = User::create([
            'email' => $person->shipping_email,
            'password' => bcrypt('admin123456'),
            'person_id' => $person->id
        ]);

        $b = Brand::create(['name' => 'Adidas']);
        $c = Category::
        $product = Product::create(['name' => 'p1', 'image' => 'img', 'brand_id' => $b->id, 'category_id' => $c->id]);
        $com = Company::create([
            'name' => 'Empresa 1', 'nit' => 1233, 'image' => 'iiiii', 'image_s' => 'iiiii',
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

        PaymentMethod::create(['name' => 'Transferencia Electrónico de fondos']);
        PaymentMethod::create(['name' => 'Tarjeta de crédito']);
        PaymentMethod::create(['name' => 'Monedero electrónico']);
        PaymentMethod::create(['name' => 'Tarjeta de débito']);
        PaymentMethod::create(['name' => 'Paypal']);
        PaymentMethod::create(['name' => 'Efecty']);





    }
}
