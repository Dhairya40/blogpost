<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use App\User;
use App\Country;
use App\State;

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

    public function users()
    {
        return $this->belongsToMany('App\user');
    }
    
    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function state()
    {
        return $this->belongsTo('App\State');
    }
    

}
