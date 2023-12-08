<?php

namespace App\Http\Controllers;

use App\Models\movieReview;
use App\Models\movie;
use Illuminate\Http\Request;

class MovieReviewController extends Controller
{
    public function store(Request $request, movie $movie)
    {
        $review = new movieReview();
        $review->movie_id = $movie->id;
        $review->review = $request->review;
        $review->save();

        return response()->json($review, 201);
    }
}
