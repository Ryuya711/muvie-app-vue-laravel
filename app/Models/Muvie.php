<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muvie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'director'
    ];
}
