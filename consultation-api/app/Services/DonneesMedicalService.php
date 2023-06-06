<?php

namespace App\Services;

use App\Repositories\DonneesMedicalRepository;

class DonneesMedicalService {

     /**
      * @var $donneesMedicalRepository
      */
    protected $donneesMedicalRepository;

    /**
    * DonneesMedicalService constructor
    *
    * @param DonneesMedicalRepository $donneesMedicalRepository
    */

    public function __construct(DonneesMedicalRepository $donneesMedicalRepository)
    {
        $this->donneesMedicalRepository = $donneesMedicalRepository;
    }

    public function updateADonneesMedical($request, $id)
    {
        $donneesMedical = $this->donneesMedicalRepository->updateADonneesMedical($request, $id);
        if($donneesMedical) {
            return true;
        } else {
            return false;
        }
    }

    public function displayAllDonneesMedicals()
    {
        return $this->donneesMedicalRepository->displayAllDonneesMedicals();
    }

    public function displayADonneesMedicalDetails($id)
    {
        return $this->donneesMedicalRepository->displayADonneesMedicalDetails($id);
    }

    public function deleteADonneesMedical($id)
    {
        return $this->donneesMedicalRepository->deleteADonneesMedical($id);
    }

    public function registerADonneesMedical($request)
    {
        $donneesMedical = $this->donneesMedicalRepository->registerADonneesMedical($request);
        if($donneesMedical) {
            return true;
        } else {
            return false;
        }
    }
}
