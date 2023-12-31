<?php

namespace App\Http\Controllers;

use App\Models\movie; 
use App\Models\movieScore;
use App\Models\movieReview;
use Illuminate\Http\Request;

class movieController extends Controller
{
    public function index()
    {
        // return movie::all();
        // 映画データとそれに関連するスコアデータを取得
        return movie::with('score')->get();
    }

    public function store(Request $request)
    {
        $movie = movie::create($request->all());

        // スコアがリクエストに含まれている場合、スコアも保存する
        if ($request->has('score')) {
            $movie->score()->create([
                'score' => $request->score
            ]);
        }

        return $movie;
    }

    public function show($id)
    {
        $movie = movie::with('score', 'review')->findOrFail($id);
        return response()->json($movie);
    }

    public function edit($id)
    {
        $movie = movie::with('score', 'review')->findOrFail($id);
        return response()->json($movie);
    }

    public function update(Request $request, $id)
    {
        // 映画データの更新
        movie::where('id', $id)->update([
            'title' => $request->title,
            'director' => $request->director
        ]);

        // 紐づくスコアデータの更新
        if ($request->has('score')) {
            $movie = movie::find($id);
            if ($movie) {
                $score = $movie->score()->firstOrCreate();
                $score->score = $request->score;
                $score->save();
            }
        }
        
        // 紐づくレビューデータの更新
        if ($request->has('review')) {
            $movie = movie::find($id);
            $movieReview = $movie->review()->firstOrCreate();
            $movieReview->review = $request->review;
            $movieReview->save();
        }
    }

    public function destroy($id)
    {
        movie::where('id', $id)->delete();
    }
}
