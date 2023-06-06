<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Services\PatientService;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\Update2Request;
use App\Http\Requests\PatientRegistrationRequest;

class PatientController extends ApiController
{

    public function __construct(PatientService $patientService)
    {
        $this->patientService = $patientService;
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = $this->patientService->displayAllPatients();
        return $this->successResponse($patients);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        $data = $this->patientService->registerAPatient($request);
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
    public function show(Patient $patient)
    {
        $patient = $this->patientService->displayAPatient($patient->id);
        return $this->successResponse($patient);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  PatientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update2Request $request, Patient $patient)
    {
        $patient = $this->patientService->updateAPatient($request, $patient->id);
        if($patient) {
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
    public function destroy(Patient $patient)
    {
        $patient = $this->patientService->deleteAPatient($patient->id);
        if($patient) {
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
