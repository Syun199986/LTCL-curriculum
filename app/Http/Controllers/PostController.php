<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;

class PostController extends Controller
{
    // 通常blog表示用index
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
    
    // 以下、webAPI表示用index
    
    // public function index(Post $post)
    // {
    //             // クライアントインスタンス生成
    //     $client = new \GuzzleHttp\Client();

    //     // GET通信するURL
    //     $url = 'https://teratail.com/api/v1/questions';

    //     // リクエスト送信と返却データの取得
    //     // Bearerトークンにアクセストークンを指定して認証を行う
    //     $response = $client->request(
    //         'GET',
    //         $url,
    //         ['Bearer' => config('services.teratail.token')]
    //     );
        
    //     // API通信で取得したデータはjson形式なので
    //     // PHPファイルに対応した連想配列にデコードする
    //     $questions = json_decode($response->getBody(), true);
        
    //     // index bladeに取得したデータを渡す
    //     return view('posts/index')->with([
    //         'posts' => $post->getPaginateByLimit(),
    //         'questions' => $questions['questions'],
    //     ]);
    // }
    
    //以下、index.blade.php等にテスト追加用html(投稿のforeach表示部分に追加)
    
    // <!--@foreach($questions as $question)-->
    // <!--	<div>-->
    // <!--		<a href="https://teratail.com/questions/{{ $question['id'] }}">-->
    // <!--			{{ $question['title'] }}-->
    // <!--		</a>-->
    // <!--	</div>-->
    // <!--@endforeach-->

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
