<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
	/**
	 * Create a new controller instance.
	 * Only accessible to logged in users
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth', ['except' => 'store']);
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
		$post = Post::find($post_id);


		//validate the data
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255',
			'comment' => 'required|min:5|max:2000'

		]);

		if ($validator->fails()) {
			return redirect(route('blog.single', [$post->slug]))
				->withErrors($validator)
				->withInput();
		}

		$comment = new Comment();
		$comment->name = $request->name;
		$comment->email = $request->email;
		$comment->comment = $request->comment;
		$comment->approved = true;
		$comment->post()->associate($post);

		$comment->save();

		Session::flash('success','The comment was successfully posted.');

		return redirect()->route('blog.single', [$post->slug]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$comment = Comment::find($id);

		//validate the data
		$validator = Validator::make($request->all(), [
			'comment' => 'required|min:5|max:2000'

		]);

		if ($validator->fails()) {
			return redirect(route('comments.edit', [$comment->id]))
				->withErrors($validator)
				->withInput();
		}

		$comment-> comment = $request->comment;
		$comment->save();

		Session::flash('success', 'The comment was successfully updated!');

		return redirect()->route('posts.show', $comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$comment = Comment::find($id);
		$comment->delete();

		Session::flash('success', 'The comment was successfully deleted');

		return redirect()->route('posts.show', $comment->post->id);
    }
}
