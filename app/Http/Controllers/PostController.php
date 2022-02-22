<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Postモデルを使う宣言
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        // postsテーブルからすべてのデータを取ってくる
        $posts = Post::all();
        // dd($posts); デバック終えたらコメントアウト
        return view('posts.index', ['posts' => $posts]);
    }

    function create()
    {
        return view('posts.create');
        
    }

    // Request = ファザード（Laravelの技法）
    function store(Request $request)
    {
            // $request に入っている値を、new postでデータベースに保存する
        $post = new Post;
        $post -> title = $request -> title;
        $post -> body = $request -> body;
        // Auth::id = データを送ったユーザー
        $post -> user_id = Auth::id();
        
        $post -> save();

        return redirect() -> route('posts.index');
    }
}
