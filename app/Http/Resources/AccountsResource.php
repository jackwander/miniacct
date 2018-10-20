<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "acct_id" => $this->acct_id,
            "acct_name" => $this->acct_name,
            "acct_detail" => $this->acct_detail,
            "user_id" => $this->user_id,
            "slug" => $this->slug,
        ];
    }

    public function with($request) {
        return [
            'version' => '1.0.0',
            'author_name' => 'Jerwin D. Arnado',
            'author_url' => url('http://jackwander.pro')
        ];
    }
}
