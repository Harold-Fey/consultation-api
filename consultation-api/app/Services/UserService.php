<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Repositories\UserRepository;

class UserService {

     /**
      * @var $userRepository
      */
    protected $userRepository;

    /**
    * UserService constructor
    *
    * @param UserRepository $userRepository
    */

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function updateAUser($request, $id)
    {
        $update = $this->userRepository->updateAUser($request, $id);
        if($update) {
            return $this->userRepository->updateAUserRole($request, $id);
        }else {
            return false;
        }
    }

    public function displayAllUsers()
    {
        return $this->userRepository->displayAllUsers();
    }

    public function displayAUser($id)
    {
        return $this->userRepository->displayAUser($id);
    }

    public function deleteAUser($id)
    {
        return $this->userRepository->deleteAUser($id);
    }

    public function createAUser($request)
    {

        $user = $this->userRepository->createAUser($request);
        if($user) {
            return $this->userRepository->assignARoleToAUser($request, $user);
        } else {
            return false;
        }
    }
}
