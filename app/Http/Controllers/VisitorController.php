<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\Company;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitors = Visitor::all();
        return view('visitors.index', compact('visitors'));
    }
    public function create()
    {
        $companies = Company::all();
        return view('visitors.create' , compact('companies'));
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
            'visitor_firstname'=>'required|max:50',
            'visitor_lastname'=>'required|max:50',
            'visitor_address' => 'required',
            'visitor_phone' => 'required|regex:/^[0-9\s\-\+\(\)]{10,}$/', // ajout d'un regex pour sécurisé 
            'visitor_email' => 'required|unique:visitors|max:100', // ajout de validateurs pour renforcer la sécurité et éviter les doublon d' adresses mail
            'company_id' => 'required'
        ]);
        Visitor::create([
            'visitor_firstname'=> $request->visitor_firstname,
            'visitor_lastname'=> $request->visitor_lastname,
            'visitor_address' => $request->visitor_address,
            'visitor_phone' => $request->visitor_phone,
            'visitor_email' => $request->visitor_email,
            'company_id' => $request->company_id
        ]);
        return redirect()->route('visitors.index')
            ->with('success', 'Visiteur ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visitor = Visitor::find($id);
        $company = $visitor->company->company_name;
        return view('visitors.show', compact('visitor','company'));
    }
    
    
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitor = Visitor::findOrFail($id);
        $companies = Company::all();
        return view('visitors.edit', compact('visitor' , 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateVisitor = $request->validate([
            'visitor_firstname'=>'required|max:50',
            'visitor_lastname'=>'required|max:50',
            'visitor_address' => 'required',
            'visitor_phone' => 'required|regex:/^[0-9\s\-\+\(\)]{10,}$/', // ajout d'un regex pour sécurisé 
            'visitor_email' => 'required|max:100', // ajout de validateurs pour renforcer la sécurité et éviter les doublon d' adresses mail
            'company_id' => 'required'
        ]);
        Visitor::whereId($id)->update($updateVisitor);
        return redirect()->route('visitors.index')
            ->with('success', 'Visiteur mis à jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();
        return redirect('/visitors')->with('success', 'Visiteur supprimé');
    }
}
