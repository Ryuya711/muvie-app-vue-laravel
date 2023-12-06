<?php

namespace App\Http\Controllers;

use App\Models\Muvie; // 追加：Muvieモデルをインポート
use App\Models\MuvieScore;
use Illuminate\Http\Request;

class MuvieController extends Controller
{
    public function index()
    {
        // return Muvie::all();
        // 映画データとそれに関連するスコアデータを取得
        return Muvie::with('score')->get();
    }

    public function store(Request $request)
    {
        $muvie = Muvie::create($request->all());

        // スコアがリクエストに含まれている場合、スコアも保存する
        if ($request->has('score')) {
            $muvie->score()->create([
                'score' => $request->score
            ]);
        }

        return $muvie;
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        // 映画データの更新
        Muvie::where('id', $id)->update([
            'title' => $request->title,
            'director' => $request->director
        ]);

        // 紐づくスコアデータの更新
        if ($request->has('score')) {
            $muvie = Muvie::find($id);
            if ($muvie) {
                $score = $muvie->score()->firstOrCreate();
                $score->score = $request->score;
                $score->save();
            }
        }
        
    }

    public function destroy($id)
    {
        Muvie::where('id', $id)->delete();
    }
}
