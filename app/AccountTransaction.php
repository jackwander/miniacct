<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountTransaction extends Model
{
    protected $table = 'account_transactions';

    protected $primaryKey = 'at_id';
    public $timestamps = true;

    protected $fillable = [
      'date','ammount','type','detail','acct_id'
    ];
    
    public function account() {
      return $this->belongsTo('App\Account');
    }
    
    public function user() {
      return $this->belongsTo('App\UserHandler');
    }
}
