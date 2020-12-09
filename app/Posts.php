<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Posts extends Model
{
    protected $table = 'posts';
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

    protected $fillable = [
        'title', 'subtitle', 'content', 'author_id', 'published_at', 'active',
    ];

    protected $searchable = [
        'title', 'subtitle', 'content',
    ];


    public function author_by()
    {
        return $this->hasMany('App\User', 'id', 'author_id');
    }


    public function commentpost()
    {
      return $this->hasMany('App\Comments', 'post_id', 'id');
    }

    public function commentauthor()
    {
      return $this->hasMany('App\User', 'id','author_id');
    }
    

    public function postimage()
    {

      return $this->hasone('App\postfiles', 'post_id', 'id');

    }
	
   

}
