<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name'=>'required',
            'company_address' => 'required',
            'company_phone' => 'required|regex:/^[0-9\s\-\+\(\)]{10,}$/', // ajout d'un regex pour sécurisé 
            'company_email' => 'required|unique:companies|max:100', // ajout de validateurs pour renforcer la sécurité et éviter les doublon d' adresses mail
        ]);
        Company::create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_phone' => $request->company_phone,
            'company_email' => $request->company_email
        ]);
        // ou Company::create($request->all());
        return redirect()->route('companies.index')
            ->with('success', 'Entreprise ajoutée avec succès !');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateCompany = $request->validate([
            'company_name'=>'required|max:50',
            'company_address' => 'required',
            'company_phone' => 'required|regex:/^[0-9\s\-\+\(\)]{10,}$/' ,
            'company_email' => 'required|unique:companies|max:100',
        ]);
        Company::whereId($id)->update($updateCompany);
        return redirect()->route('companies.index')
            ->with('success', 'Entreprise mise à jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return redirect('/companies')->with('success', 'Entreprise supprimée');

    }
}
