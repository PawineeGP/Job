@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-12"> 
      <ul class="nav nav-tabs" role="tablist">      
        <li class="nav-item">
          <a class="nav-link" href="{{route('job.index')}}">ประกาศรับสมัครงาน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('job-user.index')}}"  role="tab" >ประกาศหางาน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('resume.index')}}" >เรซูเม่</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active " href="#tabs-2"  role="tab">รายงานความไม่เหมาะสม</a>
        </li>
      </ul>
    <div class="tab-pane active" id="tabs-/" role="tabpanel">
    <br>     
        
        <div class="card">
                <div class="card-body">
                    <table class="table ">
                        <thead class="thead">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่องาน</th>
                            <th scope="col">ชื่อผู้ประกาศ</th>
                            <th scope="col">วันที่ประกาศ</th>
                            <th scope="col">วันที่อัปเดท</th>                                   
                            <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td class="text-nowrap">{{$report->user_name}}</td>
                                <td class="text-nowrap">{{$report->job_title}} </td>
                                <td>{{ Carbon\Carbon::parse($report->created_at)->format('d/m/Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($report->updated_at)->format('d/m/Y') }}</td> 

                                <td class="text-nowrap">                                          
                                    <a type="" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{ $report->id}}">ดูข้อมูล</a>                               
                                    
                                                                     <!-- MODAL -->
                                    <div class="modal fade" id="Modal{{$report->id}}" tabindex="-1" rolse="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle" style="color:#000" > แจ้งความไม่เหมาะสม</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ol style="color:#000">ชื่องาน:{{ $report->job_title }} </ol>
                                                    <ol style="color:#000">ชื่อผู้ประกาศ: {{ $report->user_name }}</ol>                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                    <!-- End -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>    
                    <div class="text-center">
                        {{$reports->links()}}
                    </div>                                 
                </div>
            </div>
    </div> 
</div>
@endsection