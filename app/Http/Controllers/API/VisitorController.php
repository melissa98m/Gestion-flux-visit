<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
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
        return response()->json([
            'status' => 'Success',
            'data' => $visitors
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
            'visitor_firstname'=>'required|max:50',
            'visitor_lastname'=>'required|max:50',
            'visitor_address' => 'required',
            'visitor_phone' => 'required|regex:/^[0-9\s\-\+\(\)]{10,}$/', // ajout d'un regex pour sécurisé 
            'visitor_email' => 'required|unique:visitors|max:100', // ajout de validateurs pour renforcer la sécurité et éviter les doublon d' adresses mail
            'company_id' => 'required'
        ]);
        $visitor = Visitor::create([
            'visitor_firstname'=> $request->visitor_firstname,
            'visitor_lastname'=> $request->visitor_lastname,
            'visitor_address' => $request->visitor_address,
            'visitor_phone' => $request->visitor_phone,
            'visitor_email' => $request->visitor_email,
            'company_id' => $request->company_id
        ]);
        return response()->json(['status' => 'Success', 'data' => $visitor]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        return response()->json($visitor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        $this->validate($request , [
            'visitor_firstname'=>'required|max:50',
            'visitor_lastname'=>'required|max:50',
            'visitor_address' => 'required',
            'visitor_phone' => 'required|regex:/^[0-9\s\-\+\(\)]{10,}$/', // ajout d'un regex pour sécurisé 
            'visitor_email' => 'required|unique:visitors|max:100', // ajout de validateurs pour renforcer la sécurité et éviter les doublon d' adresses mail
            'company_id' => 'required'
        ]);
        $visitor->update([
            'visitor_firstname'=> $request->visitor_firstname,
            'visitor_lastname'=> $request->visitor_lastname,
            'visitor_address' => $request->visitor_address,
            'visitor_phone' => $request->visitor_phone,
            'visitor_email' => $request->visitor_email,
            'company_id' => $request->company_id
        ]);
        return response()->json(['status' => 'Success', 'data' => $visitor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        $visitor->delete();
        return response()->json(['status' => 'Supprimer avec succès']);
    }
}
