<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class llibres extends Model
{
    use HasFactory;

    protected $fillable = ['titol'];

    public function authors(){
        return $this->belongsToMany(authors::class);
    }

}
