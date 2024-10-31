<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'cities_id', 'institutions_id'];

    protected $table = 'campus';

    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function institution(){
        return $this->belongsTo(Institution::class);
    }
}
