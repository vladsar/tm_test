<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'           => (int) $this->id,
            'title'        => (string) $this->title,
            'description'  => (string) $this->description,
            'is_completed' => (bool) $this->is_completed,
            'created_at'   => is_null($this->created_at) ? null : (string) $this->created_at,
        ];
    }
}
