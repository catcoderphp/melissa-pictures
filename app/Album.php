<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','description','user_id','cover'];

    public function photos() {
        return $this->hasMany('App\Photo');
    }

    
    protected static function boot() {
        parent::boot();
        //SOFT DELETE ON CASCADE TO PHOTOS
        static::deleting(function($album) {
            $album->photos()->delete();
        });

        //RESTORE ON CASCADE
        static::restored(function($album) {
            $album->photos()->withTrashed()->restore();
        });

    }
}