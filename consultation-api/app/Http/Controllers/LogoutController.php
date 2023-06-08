<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class LogoutController extends ApiController
{
    public function displayRoles ()
    {
        $roles = Role::all();
        return $this->successResponse($roles);
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
