<?php

namespace App\Http\Controllers;

use App\Models\DonneesMedical;
use Illuminate\Http\Request;
use App\Services\DonneesMedicalService;
use App\Http\Requests\DonneesMedicalRequest;
use App\Http\Requests\DonneesMedicalRegistrationRequest;

class DonneesMedicalController extends ApiController
{
    protected $donneesMedicalService;

    public function __construct(DonneesMedicalService $DonneesMedicalService)
    {
        $this->donneesMedicalService = $DonneesMedicalService;
        $this->middleware('auth:api');
        $this->middleware('role:Professionel de Santé');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DonneesMedicals = $this->donneesMedicalService->displayAllDonneesMedicals();
        return $this->successResponse($DonneesMedicals);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DonneesMedicalRequest $request)
    {
        $data = $this->donneesMedicalService->registerADonneesMedical($request);
        if ($data) {
            $message = ["message" =>__('Opération effectuée avec succès')];
            return $this->successResponse($message);
        }else{
            $error = ["message" =>__("Echec de l'opération")];
            return $this->errorResponse($error);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DonneesMedical $DonneesMedical)
    {
        $DonneesMedical = $this->donneesMedicalService->displayADonneesMedicalDetails($DonneesMedical->id);
        return $this->successResponse($DonneesMedical);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  DonneesMedicalRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonneesMedicalRequest $request, DonneesMedical $DonneesMedical)
    {
        $DonneesMedical = $this->donneesMedicalService->updateADonneesMedical($request, $DonneesMedical->id);
        if($DonneesMedical) {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonneesMedical $DonneesMedical)
    {
        $DonneesMedical = $this->donneesMedicalService->deleteADonneesMedical($DonneesMedical->id);
        if($DonneesMedical) {
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
