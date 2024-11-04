<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'states_id'];

    protected $table = 'cities';

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function institutions(){
        return $this->hasMany(Institution::class, 'institutions_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($city){
            $city->institutions()->delete();
        
        });
    }

}
