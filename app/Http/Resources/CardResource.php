<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
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
            "name"=> $this->name,
            "qr_url"=> asset($this->qr_url),
            "is_featured"=> $this->is_featured,
            "view_count"=> $this->view_count,
            "connection_count"=> $this->connection_count,
            "contact"=> ContactResource::collection($this->whenLoaded('contact')),
            "user"=> new UserResource($this->whenLoaded('user')),
        ];
    }
}
