<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\User;
use Auth;
use DB;
use Storage;
use File;
class ProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('page.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('page.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {      
        
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect(url('/admin-dasboard'));
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
        $user = User::find($id);      
        return view('page.profile.edit',compact('user'));
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
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = Auth::user()->email;
        $users->line_id = $request->line_id;
        $users->phonumber = $request->phonenumber;
        $users->address = $request->address;

        if($request->avatar != null){         
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = $file->getClientOriginalName();
                $destinationPath = public_path('/uploads/avatar');
                $filePath = $destinationPath. "/".  $name;
                $file->move($destinationPath, $name);
                $users->avatar = $name;
            }   
        }else{          
            $users->avatar = $request->avatar;
        }     
        $users->save();
        return redirect(route('user-profile.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user = User::find($id);
        $file= $user->avatar;
        $filename = public_path().'/uploads/avatar/'.$file;
        if($user->avatar != null){
            File::delete($filename);
        }        
        $user->delete();
        return redirect()->back();


    }
}
