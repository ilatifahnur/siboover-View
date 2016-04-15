<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Storage;
use validate;

class uploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function upload($idmaintenance)
    {
        return view('upload');


    }
    public function handleUpload(Request $request) {

      if($request->hasFile('file')) {
        $file = $request->file('file');
        //$allowedFilesTypes = config(app.allowedFilesTypes);
      //  $maxFileSize = config('app.maxFileSize')
        //$rules = [
          //'file' => 'required|mimes;'.$allowedFilesTypes.'|max:'.$maxFileSize
        //];
      //  $this->validate($request, $rules);
        $extension = $file->getClientOriginalExtension();

        if (($extension != 'pdf') && ($extension != 'jpg') && ($extension != 'jpeg') && ($extension != 'png')) {
          return redirect()->to('/managevehiclef');
        }
        $size = $file->getSize();
        if ($size > 50000000) {
            return redirect()->to('/managevehiclef');
        }

        $fileName = $file->getClientOriginalName();
        $destinationPath = 'uploads/'.$fileName;
        $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));

    if ($uploaded) {

    }

      }
      return redirect()->to('managevehiclef');
    }
    // public function upload(){
    //   return view('upload');
    // }
}
