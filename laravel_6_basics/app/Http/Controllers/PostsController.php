<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
    	
    	// $posts = [
    	// 	'my-first-post' => 'Hello, this my first blog post',
    	// 	'my-second-post' => 'Now I am getting the hang of this blogging thing.'
    	// ];

    	// if(!array_key_exists($post, $posts)) {
    	// 	abort(404, 'Sorry, that post was not found.');
    	// }

    	// return view('posts', [
    	// 	'post' => $posts[$post] ?? 'Nothing here yet.'
    	// ]);
    	
    	// Fetch data from the database
    	// Directly fetch from the database
    	// $post = DB::table('posts')->where('slug', $slug)->first();
    	// Fetch data from database using Model
    	// $post = Post::where('slug', $slug)->first();
    	// Fetch data, if fail return 404
    	// $post = Post::where('slug', $slug)->firstOrFail();

    	// if(!$post) {
    	// 	abort(404);
    	// }

    	// return view('posts', [
    	// 	'post' => $post
    	// ]);
    	
    	return view('post', [
    		'post' => Post::where('slug', $slug)->firstOrFail()
    	]);
    	
    }
}
