<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
        //display view of all of our categories
		$categories = Category::all();
		return view('categories.index')->with('categories', $categories);
		//it will have a form to create a new category
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

		$category = new Category;
		$category -> name = $request->name;
		$category->save();

		Session::flash('success','New category was successfully added!');

		return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
