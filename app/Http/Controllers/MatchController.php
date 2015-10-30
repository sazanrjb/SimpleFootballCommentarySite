<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Match;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MatchController extends Controller {
	protected $match;
	public function __construct(){
		$this->match = new Match();
		$this->middleware('auth',['except'=>'index']);
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
		$this->match->date = date('Y-m-d',strtotime($input['date']));
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

	public function setRunning($id){
		$match = $this->match->find($id);
		if(count($match)==0){
			\Session::flash('notice','Match not found');
			return redirect()->back();
		}else{
			$match->status = 'running';
			if($match->save()){
				\Session::flash('notice','Updated successfully');
				return redirect()->intended('/');
			}
		}
	}

	public function closeMatch($id){
		$match = $this->match->find($id);
		if(count($match)==0){
			\Session::flash('notice','Match not found');
			return redirect()->back();
		}else{
			$match->status = 'closed';
			if($match->save()){
				\Session::flash('notice','Updated successfully');
				return redirect()->back();
			}
		}
	}

	public function matchDetail($id){
		$match = $this->match->find($id);
		if(count($match)==0){
			\Session::flash('notice','Match not found');
			return redirect()->back();
		}else{
				\Session::flash('notice','Updated successfully');
				return view('commentary.match_details')->with('match',$match);
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

	public function editDetail($id){
		$match = $this->match->find($id);
		$u = new User();
		$users = $u->all();

		return view('commentary.edit')->with('match',$match)->with('authors',$users);
	}

	public function update_detail($id){
		$match = $this->match->find($id);
		$input = Input::all();

		$match->title = $input['title'];
		$match->date = date('Y-m-d',strtotime($input['date']));
		$match->status = $input['status'];
		$match->description = $input['description'];
		$match->uid = $input['author'];

		if($match->save()){
			\Session::flash('notice','Successfully update');
			return redirect()->intended('/');
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

	}

	public function search(){
		$input = Input::get('search');
		$item = $this->match->where('title','like','%'.$input.'%')->where('status','=','running')->get();
		return view('commentary.search')->with('items',$item);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$match = $this->match->find($id);
		if($match->destroy($id)){
			\Session::flash('notice','Successfully deleted');
			return redirect()->intended('/');
		}
	}

	public function logout(){
		Auth::logout();
		return redirect()->intended('/');
	}

}
