<?php

namespace App\Http\Controllers;

use App\Models\Muvie; // 追加：Muvieモデルをインポート
use Illuminate\Http\Request;

class MuvieController extends Controller
{
    public function index()
    {
        return Muvie::all();
    }

    public function store(Request $request)
    {
        return Muvie::create($request->all());
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        Muvie::where('id', $id)->update([
            'title' => $request->title,
            'director' => $request->director
        ]);
    }

    public function destroy($id)
    {
        Muvie::where('id', $id)->delete();
    }
}
