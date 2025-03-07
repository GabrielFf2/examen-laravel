<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authors extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];


    public function llibres(){
        return $this->belongsToMany(llibres::class);
    }

}
