<?php

namespace App\Services;

use App\Repositories\PredictionRepository;

class PredictionService {

     /**
      * @var $predictionRepository
      */
    protected $predictionRepository;

    /**
    * PredictionService constructor
    *
    * @param PredictionRepository $predictionRepository
    */

    public function __construct(PredictionRepository $predictionRepository)
    {
        $this->predictionRepository = $predictionRepository;
    }


    public function displayAllResultatsPredictions()
    {
        return $this->predictionRepository->displayAllResultatsPredictions();
    }

    public function displayAResultatsPrediction($id)
    {
        return $this->predictionRepository->displayAResultatsPrediction($id);
    }

    public function deleteAResultatsPrediction($id)
    {
        return $this->predictionRepository->deleteAResultatsPrediction($id);
    }

    public function registerAResultatsPrediction($request)
    {
        return $this->predictionRepository->registerAResultatsPrediction($request);
    }

    public function displayPatientsWithPredictions()
    {
        return $this->predictionRepository->displayPatientsWithPredictions();
    }
}
