<?php

namespace App\Http\Controllers;

use App\Models\MuvieScore;
use App\Models\Muvie;
use Illuminate\Http\Request;

class MuvieScoreController extends Controller
{
    public function store(Request $request, Muvie $muvie)
    {
        $score = new MuvieScore();
        $score->muvie_id = $muvie->id;
        $score->score = $request->score;
        $score->save();

        return response()->json($score, 201);
    }
}
