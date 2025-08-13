<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        // postsテーブルから全てのデータを取得し$postsに代入する
        $posts = DB::table('posts')->get();
        // posts.indexビューに$postsを渡して表示する
        return view('posts.index', compact('posts'));
    }
    public function show($id) {
        // URL'/Posts.{id}'の{id}部分と主キーの値が一致するデータをPostsテーブルから取得する
        $post = Post::find($id);

        // 変数$postをposts/show.blade.phpファイルに渡す
        return view('posts.show', compact('post'));
    }
}


