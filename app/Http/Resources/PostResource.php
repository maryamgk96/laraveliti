<?php

namespace App\Http\Resources;
use App\Http\Resources\UserResource;

use App\User;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return ['my_new_title'=>$this->title,
        'des'=>$this->body,
        'user' => new UserResource(User::find($this->user->id)),

    ];
    }
}
