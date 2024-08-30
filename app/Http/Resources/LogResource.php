<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'ip' => $this->ip,
            'url' => $this->url,
            'method' => $this->method,
            'request' => $this->request,
            'response' => $this->response,
            'created_at' => $this->created_at,
        ];
    }
}
