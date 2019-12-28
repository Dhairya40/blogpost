<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Blogpost;
class BlogpostType extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function blogpost(){
		return $this->hasToMany('App\Blogpost');
    }
}

