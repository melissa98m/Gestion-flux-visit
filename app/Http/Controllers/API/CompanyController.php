<?php

namespace App\Http\Controllers\API;

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
        return response()->json([
            'status' => 'Success',
            'data' => $companies
        ]);
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
        $company = Company::create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_phone' => $request->company_phone,
            'company_email' => $request->company_email
        ]);
        return response()->json(['status' => 'Success', 'data' => $company]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return response()->json($company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $this->validate($request , [
            'company_name'=>'required|max:50',
            'company_address' => 'required',
            'company_phone' => 'required|regex:/^[0-9\s\-\+\(\)]{10,}$/' ,
            'company_email' => 'required|unique:companies|max:100',
        ]);
        $company->update([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_phone' => $request->company_phone,
            'company_email' => $request->company_email
        ]);
        return response()->json(['status' => 'Success', 'data' => $company]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json(['status' => 'Supprimer avec succès']);
    }
}
