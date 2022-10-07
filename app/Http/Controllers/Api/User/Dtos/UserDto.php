<?php

namespace App\Http\Controllers\Api\User\Dtos;
use App\Dto\DtoInterface; 

class UserDto implements DtoInterface
{
    public $name;
    public $email;
    public $password;

    public function __construct(Object $object)
    {
        $this->name = $object->name;
        $this->email = $object->email;
        $this->password = $object->password;
    }
}