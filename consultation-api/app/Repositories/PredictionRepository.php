<?php

namespace App\Repositories;

use App\Models\DonneesMedical;
use App\Models\ResultatsPrediction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PredictionRepository
{

        /**
      * @var ResultatsPrediction
      */
    protected $ResultatsPrediction;

      /**
      * ResultatsPredictionRepository constructor
      *
      * @param  ResultatsPrediction $resultatsPrediction
      */

    public function __construct(ResultatsPrediction $resultatsPrediction)
    {
        $this->ResultatsPrediction = $resultatsPrediction;
    }

    public function DisplayAllResultatsPredictions()
    {
        return ResultatsPrediction::with('patient', 'donnees', 'medecin')->get();
    }

    public function DisplayAResultatsPrediction($id)
    {
        return ResultatsPrediction::find($id);
    }



    public function deleteAResultatsPrediction($id)
    {
        $resultatsPrediction = ResultatsPrediction::find($id);
        return $resultatsPrediction->delete();
    }


    public function registerAResultatsPrediction($request)
    {
        $userId = auth()->user()->id;
        $donnee = DonneesMedical::find($request->donnees_id);
        if ($donnee) {
            return ResultatsPrediction::create([
                'probabilite_positive' => $request->probabilite_positive,
                'probabilite_negative'=> $request->probabilite_negative,
                'resultat_prediction'=> $request->resultat_prediction,
                'valide'=> $request->valide,
                'patient_id'=> $donnee->patient_id,
                'medecin_id'=> $userId,
                'donnees_id'=> $donnee->id
            ]);
        } else {
            return false;
        }


    }

    public function displayPatientsWithPredictions ()
    {
        $predictions = ResultatsPrediction::all();
        $patients = [];
        foreach($predictions as $prediction) {
            $patient = $prediction->patient;
            array_push($patients, $patient);
        }
        return $patientsCollection = collect($patients);
    }

}
