<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'institutions';

    
    
    public function campus(){
        return $this->belongsTo(Campus::class);
    }
}
