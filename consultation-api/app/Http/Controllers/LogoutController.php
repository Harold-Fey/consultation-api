<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends ApiController
{
    public function delete(Request $request)
    {
        $request->user()->token()->revoke();
        $message = [
            "message" => __("Opération effectuée avec succès")
        ];
        return $this->successResponse($message);
    }
}
