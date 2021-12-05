<?php

namespace App\Http\Resources\Visitor;

use Illuminate\Http\Resources\Json\JsonResource;

class VisitorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [

            'id'   => $this->id,
            'name' => $this->name,
            'age'  => $this->age,
            'job'  => $this->job,

        ];
    }
}
