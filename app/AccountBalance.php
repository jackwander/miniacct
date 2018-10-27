<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountBalance extends Model
{
    protected $table = 'account_balances';

    protected $primaryKey = 'ab_id';
    public $timestamps = true;

    protected $fillable = [
      'acct_id','balance'
    ];
    
    public function account() {
      return $this->belongsTo('App\Account');
    }
}
