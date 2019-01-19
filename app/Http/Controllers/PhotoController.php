<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $photoModel = new Photo();
      $allPhotos = $photoModel::all();

      return view('photo.index')
        ->with('allPhotos', $allPhotos);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('photo.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $allFormData = $request->all();
      $title = $request->get('title');

      $rules = [
        'title' => 'required|min:8'
      ];
      //use Illuminate\Support\Facades\Validator;
      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return redirect('photo/create')
          ->withErrors($validator);

        //in create view
        //{{ $errors->first('title') }}
      }

      if (isset($title)) {
        $photo = new Photo([
          'fileName' => $title
        ]);

        $photo->save();

      }

      return redirect('photo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return view('photo.show');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $photo = Photo::find($id);

      return view('photo.edit', compact('photo','id'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
