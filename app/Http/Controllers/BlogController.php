<?php

	namespace App\Http\Controllers;

	use App\Post;
	use Illuminate\Pagination\LengthAwarePaginator;
	use Illuminate\Http\Request;
	use App\Category;
	use App\Tag;
	use App\user;

	class BlogController extends Controller
	{
		/**
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public function getIndex()
		{
			$tags = Tag::all();
			$categories = Category::all();
			//fetch all the posts from database
			$posts = Post::paginate(3);

			//return to the view and pass the data
			return view('blog.index')->with('posts', $posts)->with('categories', $categories)->with('tags', $tags);
		}

		public function getSingle($slug)
		{	
			$tags = Tag::all();
			$categories = Category::all();
			//fetch from database based on slug
			$post = Post::where('slug', '=', $slug)->first();
			$user_id = $post->user_id;
			$user = User::where('id', '=', $user_id)->first();	

			//return the view and pass in the post object
			return view('blog.single')->with('post', $post)->with('categories', $categories)->with('tags', $tags)->with('user', $user);
		}
	}
