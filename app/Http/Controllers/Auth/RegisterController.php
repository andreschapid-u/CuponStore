<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Person;
use App\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Symfony\Component\HttpFoundation\Session\Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo_envio' => 'required|string|email|max:255|unique:persons,shipping_email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $error = null;
        DB::beginTransaction();
        try {

            $registrado = Role::where('name', "Registrado")->first();
            $person = new Person();
            $person->first_name = $data['nombres'];
            $person->last_name = $data['apellidos'];
            $person->shipping_email = $data['correo_envio'];

            $user = new User();
            $user->email = $data['correo_envio'];
            $user->password = bcrypt($data['password']);

            $person = $registrado->person()->save($person);
            $user = $person->user()->save($user);

            DB::commit();
            return $user;
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
            dd("Error",$e->getMessage(),"Rollback realizado!");
        }


        // error aquí
        return "Ocurrió un error al registrar";
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // $this->create($request->all());
        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);
        $request->session()->flash('success', "Ahora estas registrado!");
        return $this->registered($request, $user) ?: redirect($this->redirectPath());

    }


}
