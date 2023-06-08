<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\LoginRepository;
use App\Traits\ApiResponser;
class LoginService {

     /**
      * @var $loginRepository
      */
    protected $loginRepository;

    /**
    * LoginService constructor
    *
    * @param LoginRepository $loginRepository
    */

    public function __construct(LoginRepository $loginRepository)
    {
        $this->loginRepository = $loginRepository;
    }

    public function findUser($request)
    {
        return $this->loginRepository->findUser($request);
    }

    public function checkIfPasswordMatch($request, $user)
    {
        return $this->loginRepository->checkIfPasswordMatch($request, $user);
    }
}
