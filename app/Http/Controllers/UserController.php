<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
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

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
