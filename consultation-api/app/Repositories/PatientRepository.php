<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Models\Nature;
use App\Models\Ticket;
use App\Models\Solution;
use App\Models\patientCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PatientRepository
{

        /**
      * @var Patient
      */
    protected $patient;
    protected $patientCategory;

      /**
      * patientRepository constructor
      *
      * @param  Patient $patient
      */

    public function __construct(patient $patient)
    {
        $this->patient = $patient;
    }


    public function displayAllPatients()
    {
        return Patient::all();
    }
    public function displayAPatientDetails($id)
    {
        return Patient::where('id', $id)->first();
    }
    public function registerAPatient($request)
    {
        //Creating the patient
        return Patient::create([
            'nom' => $request->nom,
            'prenoms'=> $request->prenoms,
            'date_de_naissance' => $request->date_de_naissance,
            'numero_de_telephone'=> $request->numero_de_telephone,
            'email'=> $request->email,
            'adresse' => $request->adresse
        ]);
    }

    public function updateAPatientInfo($request, $id)
    {
        $patient = Patient::find($id);
        return $patient->update([
            'nom' => $request->nom,
            'prenoms'=> $request->prenoms,
            'date_de_naissance' => $request->date_de_naissance,
            'numero_de_telephone'=> $request->numero_de_telephone,
            'email'=> $request->email,
            'adresse' => $request->adresse
        ]);
    }


    public function deleteAPatient($id)
    {
        $patient = Patient::find($id);
        return $patient->delete();
    }

}






