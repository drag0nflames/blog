<?php

	namespace App\Http\Controllers;

	use App\Category;
	use App\Post;
	use App\Tag;
	use Illuminate\Support\Facades\Mail;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Http\Request;
	use Session;

	class PagesController extends Controller
	{

		public function getIndex()
		{
			$tags = Tag::all();
			$categories = Category::all();
			$posts = Post::orderBy('created_at', 'desc')->get();
			return view('pages.welcome')->with('posts', $posts)->with('categories', $categories)->with('tags', $tags);
		}

		/**
		 * @return mixed
		 */
		public function getAbout()
		{

			return view('pages.about');
		}

		public function getContact()
		{
			return view('pages.contact');
		}

		/**
		 * @param Request $request
		 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
		 */
		public function postContact(Request $request)
		{
			$validator = Validator::make($request->all(), [
				'email' => 'required|email',
				'subject' => 'min:3',
				'message' => 'min:10'
			]);

			if ($validator->fails()) {
				return redirect('contact')
					->withErrors($validator)
					->withInput();
			}

			$data = array(
				'email' => $request->email,
				'subject' => $request->subject,
				'bodyMessage' => $request->message
			);

			Mail::send('emails.contact', $data, function ($message) use($data) {
				$message->from($data['email']);
				$message->to('bicky.bhujel@gmail.com');
				$message->subject($data['subject']);
		});

			//set the flash data with success message
			Session::flash('success', 'The message was successfully delivered!');

			//redirect with the flash data to the  show request//
			return redirect()->route('contact');

		}
	}