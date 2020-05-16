<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appointment;
use App\Patient;
use Carbon\Carbon;
class AppointmentController extends Controller
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
        $appointments = Appointment::where('appointment_date', '=', date('Y-m-d'))->orderBy('created_at', 'asc')->get();
        $tmp = $appointments->toArray();
        $late = array();
        $pos = 0;
        for($i=0; $i<count($tmp); $i++)
        {
            if($i+1 == count($tmp)) break;
            if($tmp[$i]['appointment_status'] == 1) $pos = $i;
            if($tmp[$i+1]['appointment_status'] == 1)
            {
                for($j=$i; $j>=$pos; $j--)
                {
                    if($tmp[$j]['appointment_status'] == 0)
                        array_push($late, $tmp[$j]['appointment_id']);
                }
            }
        } 
        return view('appointment', 
            ['appointments' => $appointments, 
            'order' => $order=1,
            'late' => $late]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = new Appointment();
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->patient_id = $request->input('patient_id');
        $appointment->save();
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
        $appointment = new Appointment();
        $appointment::where('appointment_id', $id)->update(array('appointment_status' => true));
        $app = Appointment::where('appointment_id', $id)->get();
        return redirect()->route('consultation.edit', ['consultation' => Patient::find($app->first()->patient_id)]);
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
