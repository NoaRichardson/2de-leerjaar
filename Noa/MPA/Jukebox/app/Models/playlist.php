<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "user_id"];

    public function songs(){
        return $this->belongsToMany(Song::class);
    }
    
    public function user(){
        return $this->belongsToMany(User::class);
    }
}
