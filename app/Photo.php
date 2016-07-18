<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photo extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'photo',
        'album_id'
    ];

    public function album() {
        return $this->belongsTo('App\Album');
    }

}