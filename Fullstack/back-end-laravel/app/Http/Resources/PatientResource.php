<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'Id' => $this->Id,
            'firstname' => $this->Firstname,
            'lastname' => $this->Lastname,
            'username' => $this->Username,
            'phone' => $this->Phone,
            'tokens' => $this->tokens
        ];
    }
}