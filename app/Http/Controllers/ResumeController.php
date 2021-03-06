<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resume;
use App\Models\category;
use Auth;
class ResumeController extends Controller
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
        $resumes = resume::where('user_id',Auth::user()->id)->paginate(20);
       return view('page.resume.index',compact('resumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('page.resume.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $status;

        if($request->status != null){
            $status = 1;
        }else{
            $status = 0;
        }
        $resumes = new resume();
        $resumes->user_id = Auth::user()->id;
        $resumes->name =$request->name;
        $resumes->email =$request->email;
        $resumes->sex =$request->sex;
        $resumes->nationality =$request->nationality;
       
        $resumes->attention =$request->attention;
        $resumes->education =$request->education;
        $resumes->experience = $request->experience;
        $resumes->skill = $request->skill;
        $resumes->status = $request->status;     
        $resumes->save();
        $resumes->categories()->sync($request->categories);
        return redirect(route('resume.index'));
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
       $resume = resume::find($id);
       $categories = category::all();

       return view('page.resume.edit',compact('resume','categories'));
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

        $resumes = resume::find($id);
        $resumes->user_id = Auth::user()->id;
        $resumes->name =$request->name;
        $resumes->sex =$request->sex;
        $resumes->email =$request->email;
        $resumes->nationality =$request->nationality;
        $resumes->attention =$request->attention;
        $resumes->education =$request->education;
        $resumes->experience = $request->experience;
        $resumes->skill = $request->skill;
        $resumes->status = $request->status;
     
        $resumes->categories()->sync($request->categories);
        $resumes->save();        
        return redirect(route('resume.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resume= resume::find($id);
        $file=  $resume->img_url;
        $filename = public_path().'/uploads/resume/'.$file;
        if($resume->file_url != null){
            File::delete($filename);
        }        
        $resume->delete();
        return redirect()->back();
    }
}
