<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Country extends Model
{
    use softDeletes;
	protected $guarded  = [];
    protected $dates = ['delete_at'];
}
