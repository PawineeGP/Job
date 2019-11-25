<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_job;
use App\Models\category;
use App\User;
use Auth;
use File;
class JobUserController extends Controller
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
        $user_jobs = user_job::orderBy('created_at','DESC')->paginate(20);
        $users = User::all();
        return view('page.job-user.index',compact('user_jobs','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('page.job-user.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status;
        if($request->status != null){
            $status = 1;
        }else{
            $status = 0;
        }

        $jobs = new user_job();
        $jobs->user_id = Auth::user()->id;              
        $jobs->title = $request->title;
        $jobs->description =$request->description;
        $jobs->experience =$request->experience;
        $jobs->skill =$request->skill;
        $jobs->salary =$request->salary;
        $jobs->contact =$request->contact;
        $jobs->status = $status;    
            if ($request->hasFile('filejob')) {
                $file = $request->file('filejob');
                $name = $file->getClientOriginalName();
                $destinationPath = public_path('/uploads/userjob');
                $filePath = $destinationPath. "/".  $name;
                $file->move($destinationPath, $name);
                $jobs->img_url = $name;
            }         

        $jobs->save();
        $jobs->categories()->sync($request->categories);

        return redirect(route('job-user.index'));
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
        $user_job =  user_job::find($id);
        $categories = category::all();
        return view('page.job-user.edit',compact('user_job','categories'));
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
        $status;
        if($request->status != null){
            $status = 1;
        }else{
            $status = 0;
        }

        $jobs = user_job::find($id) ;
        $jobs->user_id = Auth::user()->id;              
        $jobs->title = $request->title;
        $jobs->description =$request->description;
        $jobs->experience =$request->experience;
        $jobs->skill =$request->skill;
        $jobs->salary =$request->salary;
        $jobs->contact =$request->contact;
        $jobs->status = $status;    

        if($request->filejob != null){
            if ($request->hasFile('filejob')) {
                $file = $request->file('filejob');
                $name = $file->getClientOriginalName();
                $destinationPath = public_path('/uploads/userjob');
                $filePath = $destinationPath. "/".  $name;
                $file->move($destinationPath, $name);
                $jobs->img_url = $name;
            }   
        }else{
            $jobs->img_url = $request->filejob;
        }
                 

        $jobs->categories()->sync($request->categories);
        $jobs->save();
       

        return redirect(route('job-user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = user_job::find($id);
        $file=  $job->img_url;
        $filename = public_path().'/uploads/userjob/'.$file;
        if($job->img_url != null){
            File::delete($filename);
        }        
        $job->delete();
        return redirect()->back();

    }
}
