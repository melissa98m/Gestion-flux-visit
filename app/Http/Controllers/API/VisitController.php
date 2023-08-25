<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Visit::all();
        return response()->json([
            'status' => 'Success',
            'data' => $visits
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
            'visit_start'=>'required', // Format "Année-Mois-Jour Heure:Minute:Seconde"',
            'visit_end'=>'required',
            'visit_purpose' => 'required',
            'visitor_id' => 'required',
            'status_id' => 'required'
        ]);
        $visit = Visit::create([
            'visit_start' => $request->visit_start,
            'visit_end' => $request->visit_end,
            'visit_purpose' => $request->visit_purpose,
            'visit_comment'=> $request->visit_comment,
            'visitor_id' => $request->visitor_id,
            'status_id' => $request->status_id,
        ]);
        return response()->json(['status' => 'Success', 'data' => $visit]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        return response()->json($visit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        $this->validate($request , [
            'visit_start'=>'required', 
            'visit_end'=>'required',
            'visit_purpose' => 'required',
            'visitor_id' => 'required',
            'status_id' => 'required'
        ]);
        $visit->update([
            'visit_start' => $request->visit_start,
            'visit_end' => $request->visit_end,
            'visit_purpose' => $request->visit_purpose,
            'visit_comment'=> $request->visit_comment,
            'visitor_id' => $request->visitor_id,
            'status_id' => $request->status_id,
        ]);
        return response()->json(['status' => 'Success', 'data' => $visit]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();
        return response()->json(['status' => 'Supprimer avec succès']);
    }
}
