<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['from','to'];

    public function bookable()
    {
        return $this->belongsTo('App\Bookable');
    }

    public function scopeBetweenDates(Builder $query, $from, $to)
    {
        $query->where('to','>=',$from )->where('from', '<=',$to);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
