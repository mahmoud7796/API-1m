<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            "contact"=> $this->contact_string,
            "title"=> $this->title,
            "provider"=> new ProviderResource($this->whenLoaded('provider')),
            "card"=> ContactResource::collection($this->whenLoaded('card')),
        ];
    }
}
