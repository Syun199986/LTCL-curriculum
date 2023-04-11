<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;

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
    
    public function create(Category $category)
    {
        // return view('posts/create');
        
        return view('posts/create')->with(['categories' => $category->get()]);
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}
