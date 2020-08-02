<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RentsResource extends ResourceCollection
{

    public function toArray($request)
    {
        return [
            "status" => "success",
            "message" => "data user",
            "data" => parent::toArray($request)
        ];
    }
}


