<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $primaryKey = 'appointment_id';
    /**
     * Get the consulations for the patient.
     */
    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id');
    }

}
