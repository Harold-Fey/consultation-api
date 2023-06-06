<?php

namespace App\Http\Controllers;

use App\Models\DonneesMedical;
use App\Models\ResultatsPrediction;
use Illuminate\Http\Request;
use App\Services\PredictionService;
use App\Http\Requests\ResultatsPredictionRequest;
use App\Http\Requests\PredictionRequest;

class PredictionController extends ApiController
{

    public function __construct(PredictionService $predictionService)
    {
        $this->predictionService = $predictionService;
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $predictions = $this->predictionService->displayAllResultatsPredictions();
        return $this->successResponse($predictions);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PredictionRequest $request)
    {
        $data = $this->predictionService->registerAResultatsPrediction($request);
        if ($data) {
            $message = ["message" =>__('Opération effectuée avec succès')];
            return $this->successResponse($message);
        }else{
            $error = ["message" =>__("Les donnees spécifiées n'existe pas.")];
            return $this->errorResponse($error);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ResultatsPrediction $prediction)
    {
        $prediction = $this->predictionService->displayAResultatsPrediction($prediction->id);
        return $this->successResponse($prediction);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResultatsPrediction $prediction)
    {
        $prediction = $this->predictionService->deleteAResultatsPrediction($prediction->id);
        if($prediction) {
            $data = [
                "message" => __("Opération effectuée avec succès"),
            ];
            return $this->successResponse($data);
        } else {
            $data = [
                "message" => __("Echec de l'opération"),
            ];
        return $this->errorResponse($data);
        }
    }
}
