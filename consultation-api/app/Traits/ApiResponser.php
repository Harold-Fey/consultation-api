<?php

namespace App\Traits;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponser
{
    protected function successResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function response($response)
    {
        if ($response->failed())
            return $this->errorResponse($response->json(), $response->getStatusCode());
        return $this->successResponse($response->json(), $response->getStatusCode());
    }

    protected function responseMultipartRequest($response)
    {
        return response()->json(json_decode($response->getBody()), $response->getStatusCode());
    }

}
