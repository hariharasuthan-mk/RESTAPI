<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comments extends Model
{
    protected $table = 'comments';
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */

    protected $fillable = [
        'subtitle', 'content', 'author_id', 'post_id', 'active',
    ];
    
    public function comment_author_by()
    {
        return $this->hasMany('App\User', 'author_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo('App\Posts','author_id', 'id');
    }


    public function commentauthor()
    {
      return $this->belongsTo('App\Comments', 'author_id', 'id');
    }

   
}
