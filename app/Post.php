<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;

	protected $guarded =[];

	// declares new dates treating as timestamps using carbon
	protected $dates = ['deleted_at'];

    public function category(){

    	return $this->belongsTo(Category::class);
    }

    public function getFeaturedAttribute($featured){

    	return asset($featured); //used to generate link (accessors)
    }

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }



    public function user(){

        return $this->belongsTo(User::class);
    }

}
