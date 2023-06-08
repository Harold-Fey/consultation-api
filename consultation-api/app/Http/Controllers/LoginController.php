<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\LoginService;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;

class LoginController extends ApiController
{
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    public function store(LoginRequest $request)
    {
        try {
            $user = $this->loginService->findUser($request);
            if ($user) {
                $check = $this->loginService->checkIfPasswordMatch($request, $user);
                if ($check){
                    $token = $user->createToken('LaravelAuthApp')->accessToken;
                    return $message = [ "token" => $token, "user" => $user->load('roles')];
                }else {
                    $error = [ "error" => __('mot de passe invalide')];
                    return $this->errorResponse($error);
                }
            }else {
                $error = [ "error" => __('utilisateur non trouvé')];
                return $this->errorResponse($error);
            }
        } catch (Exception $error) {
            return $this->errorResponse($error->getMessage());
        }

    }


    public function delete(Request $request)
    {
        $request->user()->token()->revoke();
        $message = [
            "message" => __("Opération effectuée avec succès")
        ];
        return $this->successResponse($message);
    }
}
