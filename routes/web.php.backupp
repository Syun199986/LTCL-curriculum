<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('posts/index');
//     // viewヘルパ → controllerやweb.phpからviewフォルダー内のファイルを表示したい時に使用
// });

Route::get('/', [PostController::class, 'index']);

// 新規投稿と保存
Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

// '/posts/{対象データのID}'にGetリクエストが来た時、PostControllerのshowメソッドを実行
Route::get('/posts/{post}', [PostController::class, 'show']);

// 編集と更新
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update']);

// 削除
Route::delete('/posts/{post}', [PostController::class, 'delete']);

Route::get('/categories/{category}', [CategoryController::class,'index']);