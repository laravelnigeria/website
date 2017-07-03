<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['title', 'slug', 'body'];
    
    protected $dates = ['deleted_at'];
}
