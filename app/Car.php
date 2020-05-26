<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;

class Car extends Model
{
    use CanBeFavorited;

    protected $table = 'cars';
    protected $appended_attributes = ["first_image"];
    protected $casts = ['favorite' => 'boolean',];
    protected $fillable = ['image'];

    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function images()
    {
        return $this->hasMany(Image::class, 'car_id')->orderBy('sortable_index', 'asc');;
    }


    public function getFirstImageAttribute()
    {
        return $this->images->first();
    }

    /*
    public function Images()
    {
        return $this->hasMany('App\Image');
    }
    */
    
}
