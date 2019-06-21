<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table name
    // protected $table = 'posts';
    //primary key
    protected $primarykey = "id";
    //Timestampe By default : true
    public $timestamps = true;
}
