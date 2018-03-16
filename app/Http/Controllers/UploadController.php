<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $files = DB::table('uploads')->get();
        return view('upload', ['files' => $files]);
        //return view('upload',['files' => Upload::get()]);
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
     * @param  \App\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        //
    }

    public function uploadDocument(Request $request)
    {
        //dd($request);
        $validator = Validator::make($request->all(), [
                    'document'   => 'required|mimes:doc,pdf,docx,zip,rar'
                ]);

        if (($request->hasFile('document'))) {
          try {
            $file =  $request->file('document');
            $fileName = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();

            // save in folder storage/userid/filename
            $file->storeAs('document/' . Auth::user()->id , $fileName) ;

            //save filename to DB
            $upload = new Upload();
            $upload->fileName = $fileName ;
            $upload->FileExtension = $ext ;
            $upload->projectId = 1;
            $upload->save();

            return back()->with('success', 'upload file success');
          } catch (\Exception $e) {
            dd($e);

            }
          }else {
            return back()->with('warning', 'no file');
          }
  }
  public function downloadDocument($fileName)
  {
      //  1 = projectId
      $pathToFile = '../storage/app/document/1/'.$fileName;
      return response()->file($pathToFile);

  }

}
