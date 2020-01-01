<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\Profile;
class Country extends Model
{
    use softDeletes;
	protected $guarded  = [];
    protected $dates = ['delete_at'];

     
}
