<?php

namespace App;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
	use softDeletes;
	protected $guarded  = [];
    protected $dates = ['delete_at'];
    protected $fillable=[
         'first_name','last_name','image'
    ];
}
