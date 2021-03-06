<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Quote;
class User extends Authenticatable
{
    use Notifiable;


    protected $table = 'users'; //table name in database
    protected $primaryKey = 'id';
    public $incrementing=true;
    public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function quotes(){
        return $this->hasMany('\App\Quote','user_id','id');
    }
    public function comments()
    {
        return $this->hasManyThrough('App\QuoteComment', Quote::class);
    }
}
