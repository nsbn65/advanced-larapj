<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    public function get()
    {
        $text = [
        'content' => '自由に入力してください',
        ];
        return view('middleware', $text);
    }

    public function post(Request $request)
    {
        $content = $request->content;
        $text = [
        'content' => $content . 'と入力しましたね'
        ];
    return view('middleware', $text);
    }

    public function relate(Request $request)
    {
        $hasbooks = Author::has('book')->get();
        $nobooks = Author::doesntHave('book')->get();
        $param = ['hasbooks' => $hasbooks, 'nobooks' => $nobooks];
        return view('author.index',$param);
    }
}