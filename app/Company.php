<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected  $guarded = [];
    public  function  getRouteKeyName()
    {
        return 'slug';
    }
    public  function  jobs(){
        // one to many
        return $this->hasMany(job::class);
    }


}
