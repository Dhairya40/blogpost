<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;


class State extends Model
{
    use softDeletes;
	protected $guarded  = [];
    protected $dates = ['delete_at'];
}
