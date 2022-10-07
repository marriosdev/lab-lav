<?php

namespace App\Http\Controllers\Api\Task\Dtos;
use App\Dto\DtoInterface; 

class TaskDto implements DtoInterface
{
    public $title;
    public $description;
    public $user_id;
    public $created_at;

    public function __construct(Object $object)
    {
        $this->title = $object->title;
        $this->description = $object->description;
        $this->user_id = $object->user_id;
        $this->created_at = date("Y-m-d H:m:s");
    }
}