<?php

namespace App\Http\Controllers;

use App\Company;
use App\Department;
use Session;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyCreateRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BranchCreateRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("companies.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolPu = \App\Role::where('name', 'Empresario')->first();
        if ($rolPu) {
            // dd($rolPu);
            $empresarios = \App\Person::where('role_id', $rolPu->id)->get();
            return view('companies.create', compact('empresarios'));
        }
        Session::flash("error", "No hay Empresarios");
        return redirect()->route('companies.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request)
    {
        // dd(public_path("imagenes"));
        if ($request->file('logo')) {
            $image_s = Storage::disk('imagenes')->put('/images/empresas',$request->file('logo'));
            $c = new Company();
            $c->name = $request["nombre"];
            $c->nit = $request["nit"];
            $c->image = asset($image_s);
            $c->image_s = asset($image_s);
            $c->person_id =  $request["person_id"];
            // dd($c);
            $c->save();
            Session::flash("success", "Se ha registrado la empresa!");
            return redirect()->route("companies.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, $id)
    {
        return view('companies.show')->with("company", Company::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    public function create_branch($id)
    {
        // dd($id);
        $company = Company::findOrFail($id);
        $departments = Department::all();
        return view('companies.branchcreate')
        ->with('departments', $departments)
        ->with('company', $company);
    }

    public function store_branch(BranchCreateRequest $request, $company)
    {
        try{
            $com = Company::findOrFail($company);
            $b = new \App\Branch();
            $b->address = $request["direccion"];
            $b->telephone = $request["telefono"];
            $b->city_id = $request["ciudad"];
            $b->person_id = $com->person_id;
            $b->company_id = $com->id;
            $b->save();
            // dd($b);
            Session::flash("success", "Se ha registrado la sucursal!");
            return redirect()->route('companies.show',$company);
        }catch(Exeption $e){
            Session::flash("Error", "No se pudo registrar la sucursal!");
            return redirect()->back()->withInput();
        }

        // dd($request->all(), $company);
    }
}
