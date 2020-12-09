<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usersfiles extends Model
{
    protected $table = 'users_files';
    protected $fillable = [
        'title','src','mime_type','user_id','post_id','description',
    ];

    protected $searchable = [
        'title','description',
    ];
}
