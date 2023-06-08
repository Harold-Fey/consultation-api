<?php

namespace App\Repositories;

use App\Models\Nature;
use App\Models\Ticket;
use App\Models\Patient;
use App\Models\Solution;
use Illuminate\Support\Carbon;
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
        $year = intval(substr($request->date_de_naissance, 0,4));
        $yearNow= intval(Carbon::now()->format('Y'));
        $age = $yearNow - $year;
        //Creating the patient
        return Patient::create([
            'nom' => $request->nom,
            'prenoms'=> $request->prenoms,
            'date_de_naissance' => $request->date_de_naissance,
            'numero_de_telephone'=> $request->numero_de_telephone,
            'email'=> $request->email,
            'adresse' => $request->adresse,
            'age' => $age
        ]);
    }

    public function updateAPatientInfo($request, $id)
    {
        $patient = Patient::find($id);
        $year = intval(substr($request->date_de_naissance,0,4));
        $yearNow= intval(Carbon::now()->format('Y'));
        $age = $yearNow - $year;
        return $patient->update([
            'nom' => $request->nom,
            'prenoms'=> $request->prenoms,
            'date_de_naissance' => $request->date_de_naissance,
            'numero_de_telephone'=> $request->numero_de_telephone,
            'email'=> $request->email,
            'adresse' => $request->adresse,
            'age' => $age
        ]);
    }


    public function deleteAPatient($id)
    {
        $patient = Patient::find($id);
        return $patient->delete();
    }

}






