<?php

namespace App\Http\Controllers\Api\Task\Dtos;
use App\Dto\DtoInterface; 

class ResponseTaskDto implements DtoInterface
{
    public $id;
    public $title;
    public $description;
    public $created_at;
    public $updated_at;
    public $user_id;
    public $user_name;
    public $status;

    public function __construct($object)
    {
        $this->id = $object->id;
        $this->title = $object->title;
        $this->description = $object->description;
        $this->user_id = $object->user_id;
        $this->created_at = $object->created_at;
        $this->updated_at = $object->updated_at;
        $this->user_name = $object->user->name;
        $this->status = $object->status->title;
    }
}
