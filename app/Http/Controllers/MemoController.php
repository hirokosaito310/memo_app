<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

use function PHPUnit\Framework\directoryExists;

class MemoController extends Controller
{
    public function index()
    {
        $memos = Memo::all();
        return view('memos.index', ['memos' => $memos]);
    }

    public function create()
    {
        return view('memos.create');
    }

    public function store(Request $request)
    {
        // インスタンスの作成
        $memo = new Memo;

        $memo->title = $request->title;
        $memo->body = $request->body;

        $memo->save();

        return redirect('/memos');
    }

    public function show($id)
    {
        $memo = Memo::find($id);
        return view('memos.show', ['memo' => $memo]);
    }
}
