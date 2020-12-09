<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
//use App\Http\Traits\FullTextSearch;
use DB;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    //use FullTextSearch;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $searchable = [
        'name',
        'fullname',
        'email'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // A user can have multiple posts
    public function post()
    {
        return $this->hasMany('App\Posts', 'author_id', 'id');
    }

    public function userimage()
    {

      return $this->hasone('App\usersfiles', 'user_id', 'id');

    }
   
   

}
