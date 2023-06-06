<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class CustomException extends Exception
{
    protected $data;

    public function __construct($data, $code = Response::HTTP_NOT_FOUND)
    {
        parent::__construct();

        $this->data = $data;
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

}
