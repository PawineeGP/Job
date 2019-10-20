<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\category;
use App\Models\job;
use App\Models\report;
class AdminController extends Controller
{
    public function index(){
        $users = User::where('status',1)->orderBy('created_at','DESC')->paginate(20);      
        return view('admin.tab_listuser',compact('users'));
    }

    public function joblist(){
        $jobs = job::where('status',1)->orderBy('created_at','DESC')->paginate(20);
        return view('admin.tab_joblist',compact('jobs'));
    }

    public function categorylist(){
        $categories = category::orderBy('created_at','DESC')->paginate(20);
        return view('admin.tab_category',compact('categories'));
    }

   public function report(){
        $reports = report::orderBy('created_at','DESC')->paginate(20);
        $users = User::all();  
        $jobs = job::all();
        return view('admin.tab_report',compact('reports','users','jobs'));
   }
}
