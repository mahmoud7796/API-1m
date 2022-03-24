<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "id"=> $this->id,
            "fullName"=> $this->fullName,
            "email"=> $this->email,
            "profile_img"=> $this->profile_img,
            "added"=> self::collection($this->whenLoaded('added')),
            "adder"=> self::collection($this->whenLoaded('adder'))
        ];
    }
}
