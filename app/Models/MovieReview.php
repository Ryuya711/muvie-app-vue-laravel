<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id', 
        'review'
    ];

    public function movie()
    {
        return $this->belongsTo(movie::class);
    }
}
