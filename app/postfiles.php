<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postfiles extends Model
{
    //    
    protected $table = 'post_files';

    protected $fillable = [
        'title','src','mime_type','post_id','description',
    ];

    protected $searchable = [
        'title','description',
    ];

}
