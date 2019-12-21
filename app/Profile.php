<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\User;

class Profile extends Model
{
    use softDeletes;
    protected $dates = ['delete_at'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name','address','country','state','city','phone',
    ];

    public function user()
    {
        return $this->belongsTo('App\user');
    }

}
