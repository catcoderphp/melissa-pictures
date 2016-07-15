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
        'date',
        'description'
    ];

    public function album() {
        return $this->belongsTo('App\Album');
    }

}