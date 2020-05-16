<?php

namespace App\Http\Controllers;

use App\Consultation;
use Illuminate\Http\Request;
use App\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consultation = new Consultation();
        $consultation->consultation_report = $request->input('consultation_report');
        $consultation->consultation_prescript = $request->input('consultation_prescript');
        $consultation->patient_id = $request->input('patient_id');
        $consultation->next_consultation = $request->input('next_consultation');
        $consultation->save();
        return redirect()->route('appointment.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        if($patient->consultations()->count() > 0)
            $last_visit = $patient->consultations()->orderBy('created_at')->get()->last()->created_at->diffForHumans();
        else 
            $last_visit = 'First Time';
        return view('newconsultation', ['patient' => Patient::find($id), 
        'last_visit' => $last_visit]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
