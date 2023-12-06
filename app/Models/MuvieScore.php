<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuvieScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'muvie_id', 
        'score'
    ];

    public function muvie()
    {
        return $this->belongsTo(Muvie::class);
    }

}
