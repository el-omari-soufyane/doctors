<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $primaryKey = "patient_id";

    /**
     * Get the consulations for the patient.
     */
    public function consultations()
    {
        return $this->hasMany('App\Consultation', 'patient_id');
    }

    public function appointments()
    {
        return $this->hasMany('App\Appointment', 'patient_id');
    }
}
