<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'user_id',
        'share_with',
        'date'
    ];
    
    public function user (){
        return $this->belongsTo('App\User','user_id');
    }
    
    public function share() {
        return $this->belongsTo('App\User','share_with');
    }
}