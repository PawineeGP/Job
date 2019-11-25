<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\resume;
use App\User;
use PDF;
use Auth;
class DynamicPDFController extends Controller
{
    public function index(){
        $datas = resume::all();
        return view('downloadpdf.index',compact('datas'));
      
    }

    public function downloadPDF($id){       
        $data = resume::find($id);
        $pdf = PDF::loadView('invoice',compact('data'));
        return @$pdf->stream();
    }
}
