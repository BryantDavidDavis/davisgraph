<?php

class PhotosController extends \BaseController {
	protected $photo;
	
	public function __construct(Photo $photo) {
		$this->photo = $photo;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return View::make('photos.create');
	}

	public function user_photos_path() {
		return storage_path() . '/uploads/'.Auth::user()->username.'/';
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		
		$input = Input::all();
		$input['user_id'] = Auth::user()->id;
		Input::file('imagename');
		//or Input::all()['fileName']
		//validation  redirect back if image is not uploaded
		
		//$imagename = $input['imagename']->getClientOriginalName();
		$image = Image::make($input['imagename']->getRealPath());
		
		if(File::exists($this->user_photos_path())) {
			$input['thumbnailname'] = $this->photo->makeThumbnail($input['imagename']);
			$input['imagename'] = $input['imagename']->getClientOriginalName();
			$image->save($this->user_photos_path().$input['imagename']);

		} else {
			File::makeDirectory($this->user_photos_path());
			$input['thumbnailname'] = $this->photo->makeThumbnail($input['imagename']);
			$input['imagename'] = $input['imagename']->getClientOriginalName();
			$image->save($this->user_photos_path().$input['imagename']);
		}
		$this->photo->fill($input);
		$this->photo->save();
		
		return Redirect::route('users.index');
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$photo = $this->photo->getBigPhoto($id);
		return View::make('photos.show', ['photo' => $photo]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		//
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}


}
