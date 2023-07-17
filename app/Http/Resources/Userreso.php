<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Userreso extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

        'hhmn'=>$this->name,
        'jfjf'=>$this->email,
        'id'=>$this->phone,
        'tdtdg'=>$this->type_user_id,
    ];
    }
}
