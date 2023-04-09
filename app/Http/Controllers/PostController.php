<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // SQL文確認用
        // $test = $post->orderBy('updated_at', 'DESC')->limit(2)->toSql();
        // dd($test);
        
        // 'posts'はblade内で使う変数名(その中にgetを用いてインスタンス化した$postを代入)
        // return view('posts/index')->with(['posts' => $post->getByLimit()]);
        
        //getPaginateByLimit()はPost.phpで定義したメソッド
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function show(Post $post)
    {
        // dd($post);
        return view('posts/show')->with(['post' => $post]);
    }
}
