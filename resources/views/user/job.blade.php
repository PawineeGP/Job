@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-12"> 
      <ul class="nav nav-tabs" role="tablist">     
        
        <li class="nav-item">
          <a class="nav-link active" href="{{route('job.index')}}">ประกาศรับสมัครงาน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('job-user.index')}}">ประกาศหางาน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="{{route('resume.index')}}" role="tab">เรซูเม่</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{url('/user-report')}}" >รายการแจ้งความไม่เหมาะสม</a>
        </li>
      </ul>
    <div class="tab-pane active" id="tabs-3" role="tabpanel">
        <br>
        <div class="form-group">          
            <a href="{{route('job.create')}}" class="btn btn-outline-primary  btn-lg btn-block">เพิ่ม งานที่ต้องการประกาศ</a>           
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table ">Resume :
                    <thead class="thead">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">ชื่อผู้ประกาศ</th>     
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
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td class="text-nowrap">{{ $job->title}}</td>
                            <td class="text-nowrap">  
                                    @foreach ($job->categories as $category)
                                        <a href="">{{ $category->name}} </a>
                                    @endforeach   
                            </td>
                            <td class="text-nowrap">  
                                @if($job->status != 0)
                                       <p style="color:green;">แสดง </p> 
                                  @else
                                  <p style="color:red;">ไม่แสดง </p> 
                                  @endif</td>
                            <td class="text-nowrap">{{ $job->created_at}}</td>
                            <td class="text-nowrap">{{ $job->updated_at}}</td>
                        
                            <td class="text-nowrap">
                            <!-- show data  -->
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Modal{{$job->id}}">ดูข้อมูล</button>                         
                            <a href="{{route('job.edit',$job->id)}}" class="btn btn-success">แก้ไขข้อมูล</a>
                             
                            <form id="delete-form-{{ $job->id }}" 
                                        action="{{ route('job.destroy',$job->id) }}" method="post" style="display:none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    </form>

                                    <a href="" onclick="
                                        if(confirm('ต้องการลบข้อมูล ใช่ หรือ ไม่'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $job->id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">ลบข้อมูล</a>

                            <div class="modal fade" id="Modal{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle"  style="color:#000">Topic: {{$job->title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        <ol style="color:#000" classs="col-sm-9"  >Description :  {{$job->description}}</ol>
                                        <ol style="color:#000">Category :  {{$job->category_id}}</ol>
                                        <ol style="color:#000">Create Time :  {{$job->created_at}}</ol>
                                        <ol style="color:#000">Updated Time :  {{$job->updated_at}}</ol>
                                        <ol style="color:#000">Experience :  {{$job->experience}}</ol>
                                        <ol style="color:#000">Skill :  {{$job->skill}}</ol>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>
@endsection