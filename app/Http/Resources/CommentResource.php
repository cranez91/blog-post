<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'owner' => $this->owner,
            'content' => $this->content,
            'replies' => CommentResource::collection($this->whenLoaded('replies')),
        ];
    }
}