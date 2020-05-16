<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients', [
            "patients" => Patient::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newpatient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = new Patient();
        $adresse = "";
        $patient->fname_pat = ucfirst($request->input('fname'));
        $patient->lname_pat = strtoupper($request->input('lname'));
        $patient->sexe_pat = ucfirst($request->input('sexe'));
        $patient->phone_pat = $request->input('phone');
        $patient->birthday = $request->input('birth');
        $patient->cin_pat = strtoupper($request->input('cin'));
        $patient->insurance = $request->input('insurance') == "on" ? true : false;
        $adresse = ucfirst($request->input('adresse'));
        $adresse .= ", ".$request->input('city').", ".$request->input('country');
        $patient->adresse_pat = $adresse;
        $patient->save();
        return redirect()->route('patients.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getpatient(Request $request)
    {
        $name = ucfirst($request->input('name'));
        $lname = strtoupper($name);
        return json_encode(DB::table('patients')
            ->where('fname_pat', 'like', '%'.$name.'%')
            ->orWhere('lname_pat', 'like', '%'.$lname.'%')
            ->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $patient = Patient::find($id);
        return view('profile', [ 
            'patient' => $patient, 
            'consultations' => $patient->consultations->count(),
            'medicalFiles' => $patient->consultations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
