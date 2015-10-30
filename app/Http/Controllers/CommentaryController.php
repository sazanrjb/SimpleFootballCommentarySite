<?php namespace App\Http\Controllers;

use App\Commentary;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Match;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class CommentaryController extends Controller {
	protected $commentary;
	protected $match;
	public function __construct(){
		$this->middleware('auth');
		$this->commentary = new Commentary();
		$this->match = new Match();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$author = new User();
		$authors = $author->all();

		$match = new Match();
		$matches = $match->all();
		return view('commentary.index')->with('authors',$authors)->with('matches',$matches);
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
		$input = Input::all();
		$this->commentary->commentary = $input['commentary'];
		$this->commentary->mid = $input['mid'];
		$this->commentary->time = $input['time'];
		if($this->commentary->save()){
			\Session::flash('notice','Successfully added');
			return redirect()->back();
		}
	}

	public function getCommentary(){
		$id = Input::get('id');
		$c = $this->match->find($id);
		$commentary=$c->commentaries;
//		var_dump($commentary);
		$comment = array();
		foreach($commentary as $com){
			$pool =  "<br>".$com->time.": ".$com->commentary. "<hr>";
			array_push($comment,$pool);

		}
//		var_dump($commentary);
		return $comment;
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

	public function logout(){
		Auth::logout();
		return Redirect::to('login');
	}

}
