<?php

namespace App\Http\Controllers\Api\User\Dtos;
use App\Dto\DtoInterface; 

class ResponseUserDto implements DtoInterface
{
    public $id;
    public $name;
    public $email;

    public function __construct(Object $object)
    {
        $this->id = $object->id;
        $this->name = $object->name;
        $this->email = $object->email;
    }
}
