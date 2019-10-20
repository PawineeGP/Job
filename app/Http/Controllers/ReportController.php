<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\report;
use Auth;
class ReportController extends Controller
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

    public function create(Request $request){        
        $reports = new report();
        $reports->user_name = Auth::user()->name;
        $reports->user_id = $request->user_id;    
        $reports->user_report = Auth::user()->id;
        $reports->report = $request->report;
        $reports->job_title = $request->job_title;
        $reports->job_id = $request->job_id;

        $reports->save();

        return redirect()->back();
        
    }
}
