<?php

namespace App\Http\Controllers;
use App\Post;

class PagesController extends Controller{

	public function getIndex(){
		$posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
		return view('pages.welcome')->with('posts',$posts);
	}

    /**
     * @return mixed
     */
    public function getAbout(){
		$first = 'Bikky';
		$second = 'Bhujel';

		$fullname = $first." ".$second;
		$data = [];
		$data['first'] = $first;
		$data['second'] = $second;
		$data['fullname'] = $fullname;
		$data['email'] = 'bicky.bhujel@gmail.com';
		return view('pages.about')->withData($data);
	}

	public function getContact(){
		return view('pages.contact');
	}
}