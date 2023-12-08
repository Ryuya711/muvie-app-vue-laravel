<?php

namespace App\Http\Controllers;

use App\Models\movieScore;
use App\Models\movie;
use Illuminate\Http\Request;

class MovieScoreController extends Controller
{
    public function store(Request $request, movie $movie)
    {
        $score = new movieScore();
        $score->movie_id = $movie->id;
        $score->score = $request->score;
        $score->save();

        return response()->json($score, 201);
    }
}
