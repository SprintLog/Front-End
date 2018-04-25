<?php
namespace App\Http\Controllers;
use App\Upload;
use App\Images;
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
        $posts = DB::table('posts')
            ->join('users', 'posts.userId', '=', 'users.id')
            ->select('posts.*' ,'users.name' , 'users.lastname')
            ->get();
        return view('upload', ['files' => $files , 'posts' => $posts]);
        //return view('upload',['files' => Upload::get()]);
    }

    public function indexTeacher()
    {
        //
        $files = DB::table('uploads')->get();
        $posts = DB::table('posts')
            ->join('users', 'posts.userId', '=', 'users.id')
            ->select('posts.*' ,'users.name' , 'users.lastname')
            ->get();
        return view('upload', ['files' => $files , 'posts' => $posts]);
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
    public function show($id)
    {
        //
        // $files = DB::table('uploads')->where('projectId' ,$id )->get();
        $files = DB::table('uploads')
            ->join('users', 'uploads.userId', '=', 'users.id')
            ->select('uploads.*' ,'users.name' , 'users.lastname')
            ->where('projectId' ,$id )
            ->get();
        $posts = DB::table('posts')
            ->join('users', 'posts.userId', '=', 'users.id')
            ->select('posts.*' ,'users.name' , 'users.lastname')
            ->where('projectId' ,$id )
            ->get();
        return view('upload', ['files' => $files , 'posts' => $posts, 'id' => $id]);
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
    public function destroy($id)
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
            $file->storeAs('document/' . $request->projectId, $fileName) ;
            //save filename to DB
            $upload = new Upload();
            $upload->fileName = $fileName ;
            $upload->FileExtension = $ext ;
            $upload->projectId = $request->projectId;
            $upload->userId = Auth::id();
            $upload->save();
            return back()->with('success', 'upload file success');
          } catch (\Exception $e) {
            dd($e);
            }
          }else {
            return back()->with('warning', 'no file');
          }
  }

  public function deleteDocument(Request $request)
    {
      $upload = Upload::find($request->id)->delete();
      return back();
    } 

  public function uploadImage(Request $request)
  {
      //dd($request);
      $validator = Validator::make($request->all(), [
                  'image'   =>  'required | mimes:jpeg,jpg,png | max:1000',
              ]);
      if (($request->hasFile('image'))) {
        try {
          $file =  $request->file('image');
          $projectId =  $request->projectId;
          $taskId =  $request->taskId;
          $fileName = $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();
          $file->move("image/".$projectId."/".$taskId, $fileName);
          //save filename to DB
          $images = new Images();
          $images->fileName = $fileName ;
          $images->FileExtension = $ext ;
          $images->taskId = $taskId;
          $images->save();
          return back()->with('success', 'upload image success');
        } catch (\Exception $e) {
          dd($e);
          }
        }else {
          return back()->with('warning', 'no file');
        }
}
  public function downloadDocument($fileName , Request $request)
  {
      $projectId = $request->projectId ;
      $pathToFile = '../storage/app/document/' . $projectId .'/'.$fileName;
      return response()->file($pathToFile);
  }
}
