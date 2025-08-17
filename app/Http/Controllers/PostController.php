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

        public function create() {
            return view('posts.create');
        }

        public function store(Request $request) {
            //  バリデーションを設定する
            $request->validate([
                'title' => 'required|max:20',
                'content' => 'required|max:200'
            
            ]);

            // フォームの内容おを元にテーブルにデータを追加する
            $post = new Post();
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->save();

            // フォーム送信後にリダイレクトさせる
            return redirect('/posts');
    }

}
