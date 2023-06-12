<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class LoginRepository {

        /**
      * @var User
      */
      protected $user;

      /**
      * LoginRepository constructor
      *
      * @param  User $user
      */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function findUser($request)
    {
        return User::where('email', $request->email)->first();
    }

    public function checkIfPasswordMatch($request, $user)
    {
        if($request->password == $user->mot_de_passe){
            return $a = true;
        }else{
            return $b = false;
        }
    }

}

