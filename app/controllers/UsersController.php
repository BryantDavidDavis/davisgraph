<?php

class UsersController extends \BaseController {
	protected $user;
	
	public function __construct(User $user, Photo $photo) {
		$this->user = $user;
		$this->photo = $photo;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$this->user = Auth::user();
		$photos = $this->photo->getPhotoFileData($this->user->photos);
		//$img = Image::make('/home/vagrant/code/davisgraph/app/storage/uploads/bryant/thumb_Screen Shot 2014-12-24 at 09.19.58.png')->encode('data-url');
		$background_img = $this->photo->getPopularPhoto();
		return View::make('users.index', array('photos' => $photos, 'background_img' => $background_img));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$photo = new Photo();
		$background_img = $photo->getPopularPhoto();
		return View::make('users.create', array('background_img' => $background_img));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		if ( !$this->user->isValid($input) ) {
			return Redirect::back()->withInput()->withErrors($this->user->messages);
		}
		
		$input['password'] = Hash::make($input['password']);
		$this->user->fill($input);
		$this->user->save();
		if(Auth::attempt(Input::only('username', 'password'))) {
			return Redirect::route('users.index');
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
