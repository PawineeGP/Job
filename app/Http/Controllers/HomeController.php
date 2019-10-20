<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\job;
use App\Models\user_job;
use App\Models\comment;
use App\Models\report;
use App\User;
use Auth;
class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function job(){
        $jobs = job::orderBy('created_at','DESC')->paginate(20);
        return view('user.job-blog',compact('jobs'));
    }

    public function jobDetail($id){
        $job = job::find($id);
        $users = User::where('status',1)->get();
        $comments = comment::where(['job_id'=>$id])->get();      
        
        return view('user.job-detail',compact('job','comments','users'));
    }

    public function welcome(){
        $jobs =  job::where('status',1)->orderBy('created_at','DESC')->get()->count();
        return view('welcome',compact('jobs'));

    }

    public function report(){
        $reports = report::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate(20);
        return view('user.job-report',compact('reports'));
    }

    public function Jobuser(){
        $user_jobs = user_job::where('status',1)->orderBy('created_at','DESC')->paginate(20);
        return view('user.user_job_blog',compact('user_jobs'));
    }
}
