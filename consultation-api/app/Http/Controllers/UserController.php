<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserRegistrationRequest;

class UserController extends ApiController
{

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userService->displayAllUsers();
        return $this->successResponse($users);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $this->userService->createAUser($request);
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
    public function show(User $user)
    {
        $user = $this->userService->displayAUser($user->id);
        return $this->successResponse($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user = $this->userService->updateAUser($request, $user->id);
        if($user) {
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
    public function destroy(User $user)
    {
        $user = $this->userService->deleteAUser($user->id);
        if($user) {
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
