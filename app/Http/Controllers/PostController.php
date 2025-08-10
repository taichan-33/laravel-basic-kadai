<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index() {
        // postsテーブルから全てのデータを取得し$postsに代入する
        $posts = DB::table('posts')->get();
        // posts.indexビューに$postsを渡して表示する
        return view('posts.index', compact('posts'));
    }
}
