<?php

	namespace App\Http\Controllers;

	use App\Post;
	use Illuminate\Pagination\LengthAwarePaginator;
	use Illuminate\Http\Request;

	class BlogController extends Controller
	{
		/**
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function getIndex(){
			//fetch all the posts from database
			$posts = Post::paginate(10);

			//return to the view and pass the data
			return view('blog.index')->with('posts', $posts);
		}

		public function getSingle($slug)
		{
			//fetch from database based on slug
			$post = Post::where('slug', '=' ,$slug)->first();

			//return the view and pass in the post object
			return view('blog.single')->with('post', $post);
		}
	}
