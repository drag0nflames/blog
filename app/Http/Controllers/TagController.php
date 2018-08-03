<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
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
        $tags = Tag::all();
        return view('tags.index')->with('tags', $tags);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		//validate the data
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
		]);

		if ($validator->fails()) {
			return redirect(route('categories.index'))
				->withErrors($validator)
				->withInput();
		}

		$tag = new Tag();
		$tag -> name = $request->name;
		$tag->save();

		Session::flash('success','New tag was successfully added!');

		return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::find($id);
        return view('tags.show')->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit')->with('tag', $tag);
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
		//validate the data
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
		]);

		if ($validator->fails()) {
			return redirect(route('posts.edit'))
				->withErrors($validator)
				->withInput();
		}

		//save the data to database
		$tag = Tag::find($id);

		$tag->name = $request->input('name');

		$tag->save();

		//set the flash data with success message
		Session::flash('success', 'This tag was successfully updated');

		//redirect with the flash data to the  show request//
		return redirect()->route('tags.show', $tag->id);

	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$tag = Tag::find($id);

		$tag->posts()->detach();

		$tag->delete();

		Session::flash('success', 'The tag was successfully deleted');

		return redirect()->route('tags.index');

	}
}
