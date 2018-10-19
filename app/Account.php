<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';

    protected $primaryKey = 'acct_id';
    public $timestamps = true;

    protected $fillable = [
        'acct_name','acct_detail','user_id','slug',
    ];
    public function medsubclass() {
        return $this->hasMany('App\MedicineSubClassification');
    }
}


