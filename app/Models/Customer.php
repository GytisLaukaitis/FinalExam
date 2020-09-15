<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $fillable = ['name', 'surname', 'phone', 'email', 'comment', 'company_id'];

    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
}
