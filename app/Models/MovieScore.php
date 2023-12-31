<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id', 
        'score'
    ];

    public function movie()
    {
        return $this->belongsTo(movie::class);
    }
}
