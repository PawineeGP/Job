@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12"> 
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link"  href="{{url('/admin-dasboard')}}" >จัดการรายชื่อสมาชิก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab">จัดการงานที่ประกาศ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="{{url('/admin-dasboard-category')}}" >ประเภทงาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('/admin-dasboard-report')}}">รายงานความไม่เหมาะสม</a>
            </li>
        </ul>
    <!-- Tab 1 panes -->
    <br>
    <div class="tab-content">    
        
        <!-- Job list -->
        <div class="tab-pane active" id="tabs-2" role="tabpanel">          
            <div class="form-group">
                
                <a href="{{route('job.create')}}" class="btn btn-outline-primary  btn-lg btn-block">ประกาศงาน</a>
                <br>
                <label for="">รายชื่องานที่ประกาศ : <mat-tab label="TabHeader"></mat-tab> </label>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-dark">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">หัวข้องาน</th>
                            <th scope="col">หมวด</th>
                            <th scope="col">สถานะ</th>
                            <th scope="col">วันที่ประกาศ</th>
                            <th scope="col">วันที่อัปเดท</th>
                            
                            <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobs as $job)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td class="text-nowrap"> {{$job->title}}</td>
                                <td> 
                                    @foreach ($job->categories as $category)
                                        <a href="">{{ $category->name}} </a>
                                    @endforeach    
                                </td>
                                <td class="text-nowrap">                                    
                                    @if($job->status != 0)
                                        <p style="color:green;">แสดง </p> 
                                    @else
                                    <p style="color:red;">ไม่แสดง </p> 
                                    @endif
                                </td>
                                <td>{{ Carbon\Carbon::parse($job->created_at)->format('d/m/Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($job->updated_at)->format('d/m/Y') }}</td>                              
                                
                                <td class="text-nowrap">
                                    <!-- Button trigger modal -->
                                    <a type="" class="btn btn-primary" data-toggle="modal" data-target="#Modal2{{$job->id}}">ดูข้อมูล</a>
                                    <a href="{{route('job.edit',$job->id)}}" class="btn btn-success">แก้ไขข้อมูล</a>
                                     
                                    <form id="delete-form-{{ $job->id }}" 
                                        action="{{ route('job.destroy',$job->id) }}" method="post" style="display:none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    </form>

                                    <a href="" onclick="
                                        if(confirm('ต้องการลบ ใช่ หรือ ไม่?'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $job->id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">ลบข้อมูล</a>  


                                    <div class="modal fade" id="Modal2{{$job->id}}" tabindex="-1" rolse="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle" style="color:#000" >Topic: </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ol style="color:#000">Description : {{$job->description}}</ol>
                                            <ol style="color:#000">Category : </ol>
                                            <ol style="color:#000">Create Time :  </ol>
                                            <ol style="color:#000">Updated Time :  </ol>
                                            <ol style="color:#000">Experience : {{$job->experience}} </ol>
                                            <ol style="color:#000">Skill : {{$job->skill}} </ol>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                                          
                                        </div>
                                        </div>
                                    </div>
                                    </div>                                 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>  
                    <div class="text-center">
                        {{$jobs->links()}}
                    </div>    
                </div>
            </div>
        </div>  
    </div>

@endsection