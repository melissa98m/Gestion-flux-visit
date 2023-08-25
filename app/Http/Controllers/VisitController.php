<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Visit;
use App\Models\Visitor;
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
        return view('visits.index', compact('visits'));
    }

    public function create()
    {
        $visitors = Visitor::all();
        $status = Status::all();
        return view('visits.create' , compact('visitors','status'));
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
        Visit::create([
            'visit_start' => $request->visit_start,
            'visit_end' => $request->visit_end,
            'visit_purpose' => $request->visit_purpose,
            'visit_comment'=> $request->visit_comment,
            'visitor_id' => $request->visitor_id,
            'status_id' => $request->status_id,
        ]);
        return redirect()->route('visits.index')
            ->with('success', 'Visite ajoutée avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::find($id);
        $visitor = $visit->visitor->visitor_lastname;
        $status = $visit->status->status_name;
        return view('visits.show', compact('visit','visitor', 'status'));
    }

    public function edit($id)
    {
        $visit = Visit::findOrFail($id);
        $visitors = Visitor::all();
        $status = Status::all();
        return view('visits.edit', compact('visit' , 'visitors', 'status'));
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
        $updateVisit = $request->validate([
            'visit_start'=>'required|date_format:Y-m-d H:i:s', // Format "Année-Mois-Jour Heure:Minute:Seconde"',
            'visit_end'=>'required|date_format:Y-m-d H:i:s',
            'visit_purpose' => 'required',
            'visitor_id' => 'required',
            'status_id' => 'required'
        ]);
        Visit::whereId($id)->update([$updateVisit , 'visit_comment'=> $request->visit_comment]);
        return redirect()->route('visits.index')
            ->with('success', 'Visite mise à jour avec succes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();
        return redirect('/visits')->with('success', 'Visite supprimée');
    }
}
