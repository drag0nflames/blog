<?php

	namespace App\Http\Controllers;

	use App\Category;
	use Illuminate\Support\Facades\Validator;
	use Session;
	use App\Tag;
	use Illuminate\Http\Request;
	use App\Post;
	use Purifier;
	use Image;
	use Storage;

	class PostController extends Controller
	{
		/**
		 * Create a new controller instance.
		 * Only accessible to logged in users
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('auth');
		}


		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			//create a variable and stores all the blogposts in it from database
			$posts = Post::orderBy('id', 'desc')->paginate(10);

			//return a view and pass in above variable basically
			return view('posts.index')->with('posts', $posts);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			$categories = Category::all();
			$tags = Tag::all();
			return view('posts.create')->with('categories', $categories)->with('tags', $tags);
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			//validate the data
			$validator = Validator::make($request->all(), [
				'title' => 'required|unique:posts,title|max:255',
				'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
				'body' => 'required',
				'category_id' => 'required|integer'
			]);

			if ($validator->fails()) {
				return redirect(route('posts.create'))
					->withErrors($validator)
					->withInput();
			}


			//store in the database//
			$post = new Post;

			$post->title = $request->title;
			$post->slug = $request->slug;
			$post->body = Purifier::clean($request->body);
			$post->category_id = $request->category_id;

			//save our image
			if ($request->hasFile('featured_image')) {
				$image = $request->file('featured_image');
				$filename = time() . '.' . $image->getClientOriginalExtension();
				$location = public_path('images/' . $filename);
				Image::make($image)->save($location);

				$post->image = $filename;
			}

			$post->save();

			$post->tags()->sync($request->tags, false);

			Session::flash('success', 'The blog post was successfully saved!');


			//redirect to the another page//
			return redirect()->route('posts.show', $post->id);
		}

		/**
		 * Display the specified resource.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function show($id)
		{
			$post = Post::find($id);
			return view('posts.show')->with('post', $post);
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit($id)
		{
			$tags = Tag::all();
			$categories = Category::all();

			//find post in the database and save it as a variable//
			$post = Post::find($id);

			//return view and pass the variable obtained previously
			return view('posts.edit')->with('post', $post)->with('categories', $categories)->with('tags', $tags);

		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, $id)
		{
			//validate the data

			$post = Post::find($id);

			if ($request->input('slug') == $post->slug || $request->input('title') == $post->title) {
				$validator = Validator::make($request->all(), [
					'category_id' => 'required|integer',
					'featured_image' => 'image',
					'body' => 'required',
				]);
			} else {
				$validator = Validator::make($request->all(), [
					'title' => 'required|unique:posts,title|max:255',
					'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
					'featured_image' => 'image',
					'category_id' => 'required|integer',
					'body' => 'required',
				]);
			}


			if ($validator->fails()) {
				return redirect(route('posts.edit', $id))
					->withErrors($validator)
					->withInput();
			}

			//save the data to the form
			$post = Post::find($id);

			$post->title = $request->input('title');
			$post->slug = $request->input('slug');
			$post->body = Purifier::clean($request->input('body'));
			$post->category_id = $request->input('category_id');

			if ($request->hasFile('featured_image')) {
				//add the new photo
				$image = $request->file('featured_image');
				$filename = time() . '.' . $image->getClientOriginalExtension();
				$location = public_path('images/' . $filename);
				Image::make($image)->save($location);
				$oldFileName = $post->image;

				//update the database to reflect the new photo
				$post->image = $filename;

				//delete the old photo
				Storage::delete($oldFileName);
			}

			$post->save();

			$post->tags()->sync($request->tags);

			//set the flash data with success message
			Session::flash('success', 'This post was successfully updated');

			//redirect with the flash data to the  show request//
			return redirect()->route('posts.show', $post->id);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id)
		{
			$post = Post::find($id);

			$post->tags()->detach();

			Storage::delete($post->image);
			
			$post->delete();

			Session::flash('success', 'The post was successfully deleted');

			return redirect()->route('posts.index');

		}
	}
