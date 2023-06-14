<?php

namespace App\Repositories;

use App\Models\DonneesMedical;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DonneesMedicalRepository
{

        /**
      * @var DonneesMedical
      */
    protected $donneesMedical;

      /**
      * DonneesMedicalRepository constructor
      *
      * @param  DonneesMedical $donneesMedical
      */
    public function __construct(DonneesMedical $donneesMedical)
    {
          $this->donneesMedical = $donneesMedical;
    }

    public function registerADonneesMedical($request)
    {
        return DonneesMedical::create([
            "sexe" => $request->sexe,
            "hypertension" => $request->hypertension,
            "probleme_cardiaque" => $request->probleme_cardiaque,
            "bmi" => $request->bmi,
            "glucose" => $request->glucose,
            "fumeur" => $request->fumeur,
            "hbaic" => $request->hbaic,
            "patient_id" => $request->patient_id

        ]);
    }

    public function displayAllDonneesMedicals()
    {
        return DonneesMedical::with('patient', 'predictions')->get();
    }

    public function displayADonneesMedicalDetails($id)
    {
        return DonneesMedical::find($id)->load('patient', 'predictions');
    }

    public function updateADonneesMedical($request, $id)
    {
        $DonneesMedical = DonneesMedical::find($id);
        return $DonneesMedical->update([
            "sexe" => $request->sexe,
            "hypertension" => $request->hypertension,
            "probleme_cardiaque" => $request->probleme_cardiaque,
            "bmi" => $request->bmi,
            "glucose" => $request->glucose,
            "fumeur" => $request->fumeur,
            "hbaic" => $request->hbaic
        ]);
    }

    public function deleteADonneesMedical ($id)
    {
        $DonneesMedical = DonneesMedical::find($id);
        return $DonneesMedical->secureDelete('predictions');

    }

    public function displayPatientsWithDonnees ()
    {
        $donnees = DonneesMedical::all();
        $patients = [];
        foreach($donnees as $donnee) {
            $patient = $donnee->patient;
            $patient->load('donnees');
            array_push($patients, $patient);
        }
        return $patientsCollection = collect($patients);
    }


}
