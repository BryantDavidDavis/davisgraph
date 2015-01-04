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
		//$image = Image::make(Input::file('imagename'));
		$image = $image->resize(1280, null, function($constraint) {
			$constraint->aspectRatio();
			$constraint->upsize();
		});
		
		if(File::exists($this->user_photos_path(Auth::user()->id))) {
			$input['thumbnailname'] = $this->photo->makeThumbnail($input['imagename']);
			$input['imagename'] = microtime().$input['imagename']->getClientOriginalName();
			$image->save($this->user_photos_path(Auth::user()->id).$input['imagename']);

		} else {
			File::makeDirectory($this->user_photos_path(Auth::user()->id));
			$input['thumbnailname'] = $this->photo->makeThumbnail($input['imagename']);
			$input['imagename'] = microtime().$input['imagename']->getClientOriginalName();
			$image->save($this->user_photos_path(Auth::user()->id).$input['imagename']);
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
		$image = $this->photo->getBigPhoto($id);
		$photo = $this->photo->find($id);
		$photo->clicks++;
		$photo->save();
		return View::make('photos.show', ['image' => $image, 'photo' => $photo]);
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
		//echo "We are here";
		//die;
		//$this->photo->delete($id);
		//return Redirect::route('users.index');
	}
	
	public function photoDestroy($id) {
		$this->photo->destroy($id);
		return Redirect::route('users.index');
	}

}
