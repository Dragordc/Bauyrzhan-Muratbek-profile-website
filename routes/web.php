<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BlogController;
use App\Models\Post;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LocalizationController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/aboutme',function(){
	return view('project');
});
Route::get('/skill',function(){
	return view('skill');
});
Route::get('/contact',function(){
	return view('contact');
});
Route::get('/{lang}',function ($lang){
	App()->setLocale($lang);
	return view('project');
});
Route::get('lang/{lang}', [LocalizationController::class, 'index']);


/*Route::resource('posts','App\Http\Controllers\PostController');
Route::resource('student','App\Http\Controllers\StudentController',['parameters'=>['student'=>'admin_student']]);
Route::get('/cont',function(){
	return view('cont',['name'=>'John']);
});
Route::get('/insert',function() {
	DB::insert('insert into posts(title,body) values(?,?)',['Ыбырай Алтынсарин','Ыбырай Алтынсарин агартушы.']);
});
Route::get('/select',function() {
	$results = DB::select('select*from posts where id = ?',[1]);
	foreach ($results as  $posts) {
		echo "Title is: ".$posts->title;
		echo "<br>";
		echo "body is: ".$posts->body;
	}
});
Route::get('/update',function(){
	$updated = DB::update('update posts set title ="software tester" where id = ?',[1]);
	return $updated;
});
Route::get('/delete',function() {
	$deleted=DB::delete('delete from posts where id = ?',[2]);
	return $deleted;
});*/
/*Route::get('/blog/index',function () {
	$results = DB::select('select*from posts');
	foreach ($results as  $posts) {
		echo "Title is: ".$posts->title;
		echo "<br>";
		echo "body is: ".$posts->body;
		echo "<br>";
	}
});
Route::get('/blog/create',function () {
	DB::insert('insert into posts(title,body) values(?,?)',['Ыбырай Алтынсарин ','Ыбырай Алтынсарин агартушы.']);
});*/

Route::get('blog/index', [BlogController::class, 'index']);
Route::get('blog/create', function(){
     return view('post.create');
});
Route::post('blog/create', [BlogController::class, 'store'])->name('add-post');

Route::get('/read',function() {
	$posts = Post::all();
	foreach ($posts as $post) {
		# code...
		echo $post -> body;
		echo "<br>";
	}

});
Route::get('/basicupdate',function(){
	$post = Post::find(2);
	$post->title='Haseena';
	$post->body='Graphic Designer';
	$post->save();
});
Route::get('/delete',function() {
	$post = Post::find(2);
	$post->delete();
});

Route::get('/fund',function(){
	$posts = Post::where('id',2)->first();
	return $posts;
});
Route::get('/fand',function(){
	$posts = Post::where('id',1)->value('body');
	return $posts;
});
Route::get('/post/create',function(){
	$post = new Post;
	$post->title='Abai';
	$post->body='Oiwyl';
    $post->save();
});
Route::get('/post',function () {
	$posts = Post::find(3);
	return $posts;
});
Route::get('user/{name?}',function ($name  =  null) {
    return $name;
});
Route::get('client/{id}',[BlogController::class,'get_client']);
Route::get('practice',function() {
   return view('post.practice');
});
Route::get('form/create', function(){
     return view('post.create');
});
Route::post('form/create', [BlogController::class, 'store'])->name('ad-post');
Route::get('mail/send','MailController@send');





