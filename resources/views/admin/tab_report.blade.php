@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12"> 
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link"  href="{{url('/admin-dasboard')}}">จัดการรายชื่อสมาชิก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin-dasboard-job')}}">จัดการงานที่ประกาศ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"href="{{url('/admin-dasboard-category')}}" >ประเภทงาน</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-4" role="tab">รายงานความไม่เหมาะสม</a>
            </li>
        </ul>
    <!-- Tab 1 panes -->
    <br>
    <div class="tab-content">   
     <!-- Category list -->
        <div class="tab-pane active" id="tabs-4" role="tabpanel">                       
          
            <div class="card">
                <div class="card-body">
                    <table class="table table-dark">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อผู้ประกาศ</th>
                            <th scope="col">ชื่องาน</th>
                            <th scope="col">ผู้รายงาน</th>                           
                            <th scope="col">วันที่ประกาศ</th>
                            <th scope="col">วันที่อัปเดท</th>                                   
                            <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td class="text-nowrap">
                                    @foreach($users as $user)
                                        @if($report->user_id == $user->id)
                                            {{ $user->name }}
                                        @endif
                                    @endforeach                               
                                </td>
                                <td class="text-nowrap">{{$report->job_title}} </td>
                                <td class="text-nowrap">{{$report->user_name}} </td>
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
        <!-- end tab 3 -->
      
    </div>

@endsection