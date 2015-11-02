<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UserController extends Controller {

	protected $user;
	public function __construct(){
		$this->user = new User();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('commentary.users');
	}

	public function getUsers(){
		$users = $this->user->all();
		return response()->json(array(
			'record' => $users
		));
	}

	public function insertUser(){
		$this->user->name = Input::get('name');
		$this->user->username = Input::get('username');
		$this->user->password = Hash::make(Input::get('username'));
		$this->user->save();
	}

	public function updateUser(){
//		var_dump($data);
		$user = $this->user->find(Input::get('id'));

		$user->name = Input::get('name');
		$user->username = Input::get('username');
		$user->save();
	}

	public function deleteUser(){
		$user = $this->user->find(Input::get('id'));
		$user->delete();
	}

	public function changePassword(){
		return view('commentary.changepassword');
	}

	public function doChangePassword(Requests\UserRequest $userRequest)
	{
		if (Input::get('newPassword') != Input::get('confirmPassword')) {
			\Session::flash('notice', 'Passwords donot match');
			return redirect()->back();
		} else {
			$check = Auth::attempt(array(
				'password' => $userRequest['oldPassword']
			));
//			var_dump(Hash::make($userRequest['oldPassword']));
//			echo "<br>";
//			var_dump(Auth::user()->password);

			if($check){
				$users = $this->user->find(Auth::id());
				$users->password = Hash::make($userRequest['newPassword']);
				if($users->save()){
					\Session::flash('notice', 'Successfully updated');
					return redirect()->back();
				}
			}else{
				\Session::flash('notice', 'Incorrect Password');
				return redirect()->back();
			}
		}
	}

}
