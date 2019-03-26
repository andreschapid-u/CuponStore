<?php

namespace App\Http\Controllers;

use App\Person;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PersonStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\PersonUpdateRequest;

class PersonController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('administrador');
        // $this->middleware('empresario');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('persons.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('persons.create')->with('roles', Role::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonStoreRequest $request)
    {
        DB::beginTransaction();
        try {

            $person = new Person();
            $person->first_name = $request['nombres'];
            $person->last_name = $request['apellidos'];
            $person->shipping_email = $request['correo_envio'];

            $user = new User();
            $user->email = $request['correo_envio'];
            $user->password = bcrypt($request['password']);

            if (Auth::user()->isAdmin()) {
                $registrado = Role::find($request['rol']);
                $person = $registrado->person()->save($person);
            } else {
                $registrado = Role::where('name', 'Checker')->first();
                $person = $registrado->person()->save($person);
            }
            $user = $person->user()->save($user);

            DB::commit();
            Session::flash('success', "Se ha guaradado correctamente.");
            return redirect()->route('persons');
        } catch (\Exception $e) {
            $success = false;
            DB::rollback();
            dd("Error", $e->getMessage(), "Rollback realizado!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        $roles = Role::all();
        return view('persons.show')
        ->with("roles",$roles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,  $person)
    {
        return view('persons.edit')
            ->with('person', Person::find($person))
            ->with('roles', Role::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(PersonUpdateRequest $request, $id)
    {
        $person = Person::find($id);
        $person->first_name = $request['nombres'];
        $person->last_name = $request['apellidos'];
        $person->shipping_email = $request['correo_envio'];
        $person->save();

        return back()->with('success', "Se ha guaradado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }

    public function getPersonsAll()
    {

        // $user = Auth::user()->person;
        $personQuery = \App\Person::with('role')->with('user')->select('persons.*');
        // $personQuery = \App\Person::query();
        // $dbPersons = \App\Person::join('roles', 'roles.id', 'persons.id')->get();
        // $dbPersons = DB::table('persons')->join('roles', 'roles.id', 'persons.id');

        // dd($personQuery, $dbPersons);
        // dd($personQuery);

        // ->eloquent($personQuery)
        return datatables()
            ->eloquent($personQuery)
            ->addColumn('options', 'persons.partials.actions')
            ->rawColumns(['options'])
            ->toJson();
        }
    }
                        // ->addColumn('role', function ($model) {
                        //     return $model->role->name;
                        // })
                        // ->addColumn('email', function ($model) {
                        //     return $model->user->email;
                        // })
