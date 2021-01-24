<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    protected  $guarded = [];
    public  function  getRouteKeyName()
    {
        return 'slug';
    }

    public  function  company(){
        // one to many (inverse)
        return $this->belongsTo(Company::class);
    }
    public function  users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public  function  jobApplication(){
        return \DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }
}
