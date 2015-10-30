<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Match;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MatchController extends Controller {
	protected $match;
	public function __construct(){
		$this->match = new Match();
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$id = Input::get('id');
		$match = $this->match->find($id);
		if($match == null){
			\Session::flash('notice','Error');
			return redirect()->back();
		}else{
			return view('commentary.matchviewer',compact('match',$match));
		}
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
	public function store(Requests\NewMatchRequest $newMatchRequest)
	{
		$input = Input::all();
		$this->match->title = $input['title'];
		$this->match->date = $input['date'];
		$this->match->status = $input['status'];
		$this->match->description = $input['description'];
		$this->match->uid = $input['author'];

		if($this->match->save()){
			\Session::flash('notice','Successfully added match. This match will be hidden to the public unless it is set as running.');
			return redirect()->back();
		}else{
			\Session::flash('notice','Error adding a match');
			return redirect()->back();
		}

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
		$match = $this->match->find($id);
		if(count($match)>0){
			return view('commentary.single_match')->with('match',$match);
		}else{
			\Session::flash('notice','Match not found. ID:' . $match->id);
			return redirect()->back();
		}
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
