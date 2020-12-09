<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Student extends Model
{
    protected $table = 'posts';
    public $fillable = [
        'name',
        'email',
    ];
}
