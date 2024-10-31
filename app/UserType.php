<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    protected $table = 'users_type';


    //UserType tem muitos Users
    public function users(){
        return $this->hasMany(User::class);
    }
}
