<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $table = 'states';

    protected $fillable = [
        'name'
    ];

    public function cities(){
        return $this->hasMany(City::class, 'states_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($state){
            $state->cities()->delete();
        
        });
    }
    
}
