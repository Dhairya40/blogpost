<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\BlogpostType;
use App\User;

class Blogpost extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function BlogpostType(){
    	return $this->belongsTo("App\BlogpostType");
    }

    public function user(){
    	return $this->belongsTo("App\User");
    }


    public function getRouteKeyName(){
    	return 'slug';
    }
}

