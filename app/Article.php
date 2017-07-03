<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['title', 'slug', 'body'];
    
    protected $dates = ['deleted_at'];
    
    protected static function boot ()
    {
	    parent::boot();
	    
	    static::creating(function($article) {
	    	if (is_null($article->title))
	    		throw new \Exception("Uh oh! You forgot to set the title.");
	    	
	    	if (is_null($article->slug))
	    		$article->createUniqueSlug();
	    });
    }
    
    private function createUniqueSlug( $suffix="" )
    {
    	$slug = str_limit(str_slug($this->title), 30, "") . $suffix;
    	
    	if (self::where('slug', $slug)->exists()) {
    		$this->createUniqueSlug(time());
    		return;
	    }
	    
	    $this->slug = $slug;
    }
    
    public function getRouteKeyName () {
	    return "slug";
    }
	
	public function author ()
	{
		return $this->belongsTo(User::class, 'user_id');
    }
}
