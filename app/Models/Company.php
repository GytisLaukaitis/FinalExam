<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $fillable = ['name', 'address'];

    public function customers(){
        return $this->hasMany('App\Models\Customer');
    }
}
