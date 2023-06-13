<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParentResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
        'Name_parents'=>$this->Name_parents,
        'Phone'=>$this->Phone,
        'identity_id'=>$this->identity_id,
        'Number_identity'=>$this->Number_identity,
        'sex_id'=>$this->sex_id,
        'sexual_id'=>$this->sexual_id,
        'Job'=>$this->Job,
        'link_kinship'=>$this->link_kinship,
        'Social_status'=>$this->Social_status,
        
    ];
    }
}
