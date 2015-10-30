<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller {

	public function __construct(){
		$this->middleware('guest');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('commentary.login');
	}

	public function dologin(Requests\LoginRequest $loginRequest)
	{

		$input = Input::all();
		$check = Auth::attempt(array(
			'username' => $input['username'],
			'password' => $input['password']
		));

		if($check){
			return redirect('/');
		}else{
			\Session::flash('notice','Invalid username or password');
			return redirect()->back();
		}
	}
}
