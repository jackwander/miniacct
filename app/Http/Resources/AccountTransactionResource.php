<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountTransactionResource extends JsonResource
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
            "at_id" => $this->at_id,
            "acct_id" => $this->acct_id,
            "date" => $this->date,
            "deposit" => $this->deposit,
            "withdraw" => $this->withdraw,
            "detail" => $this->detail,
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
