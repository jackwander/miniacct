<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHandler extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'fname','mname','lname','contactnum', 'email', 'password', 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts() {
        return $this->hasMany('App\Account');
    }

    public function transactions() {
        return $this->hasMany('App\AccountTransaction');
    }
}
