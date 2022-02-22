<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Postモデルを使う宣言
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        // postsテーブルからすべてのデータを取ってくる
        $posts = Post::all();
        // dd($posts); デバック終えたらコメントアウト
        return view('posts.index', ['posts' => $posts]);
    }
}
