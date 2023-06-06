<?php

namespace App\Services;

use App\Repositories\PatientRepository;

class PatientService {

     /**
      * @var $patientRepository
      */
    protected $patientRepository;

    /**
    * PatientService constructor
    *
    * @param PatientRepository $patientRepository
    */

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function displayAPatientDetails($id)
    {
        return $this->patientRepository->displayAPatientDetails($id);
    }

    public function displayAllPatients()
    {
        return $this->patientRepository->displayAllPatients();
    }

    public function registerAPatient($request)
    {
        return $this->patientRepository->registerAPatient($request);
    }

    public function deleteAPatient($id)
    {
        return $this->patientRepository->deleteAPatient($id);
    }
}
