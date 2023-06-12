<?php

namespace App\Http\Controllers;

use App\Services\DonneesMedicalService;
use App\Services\PredictionService;
use Illuminate\Http\Request;

class ListController extends ApiController
{
    protected $predictionService;
    protected $donneeService;
    public function __construct(
        PredictionService $predictionService,
        DonneesMedicalService $donneeService
    )
    {
        $this->predictionService = $predictionService;
        $this->donneeService = $donneeService;

        $this->middleware('auth:api');
        $this->middleware('role:Medecin')->only(['displayPatientsWithPredictions']);
        $this->middleware('role:Medecin|Professionel de Santé')->only(['displayPatientsWithDonnees']);

    }

    public function patientsWithDonnees()
    {
        return $this->donneeService->displayPatientsWithDonnees();

    }

    public function patientsWithPredictions()
    {
        return $this->predictionService->displayPatientsWithPredictions();
    }
}
