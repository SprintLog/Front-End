<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('auth.login');
    }

    public function login(Request $request)
    {
      // dd($request);
      $user = new User;
      // echo $request->email;
      // echo bcrypt($request->password);

      if (! Auth::attempt(['email' => $request->email, 'password' => bcrypt($request->password)])){
        dd("correct");
      }
      else{
        dd("login data incorrect!");
      }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);

      $validator = Validator::make($request->all(),[
           'name'        => 'required|nullable|string|max:25',
           'lastname'    => 'required|nullable|string|max:25',
           'email'       => 'required|nullable|unique:users|max:150',
           'password'    => 'required|nullable|max:25',
           'typeuser'    => 'required|numeric'
       ]);



       if ($validator->fails()) {
           return back()->withErrors($validator)->withInput();
       }

      // $user = new User;
      // $user->projectid  = 0; // zero ก่อนเพราะยังไม่ได้ใส่ค่าตอนสร้างโปรเจค
      // $user->name       = $request->name;
      // $user->lastname   = $request->lastname;
      // $user->email      = $request->email;
      // $user->password   = bcrypt($request->password);
      // $user->typeuser   = $request->typeuser;
      // dd($request['name']);
      $user = User::create([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'typeuser' => $request['typeuser']
        ]);

      // $user->save();
      // auth()->login($user);

      return back()->with('success', 'Register Success');
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
}
