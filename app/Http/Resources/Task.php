<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
        'id'=>$this->id,
        'list_id '=>$this->list_id,
        'titel'=>$this->titel,
        'due_date'=>$this->due_date,
        'description'=>$this->description,
        'status'=>$this->status,
        'created_at'=>$this->created_at->format('d/m/Y'),
        'updated_at'=>$this->updated_at->format('d/m/Y'),
        ];
    }
}
