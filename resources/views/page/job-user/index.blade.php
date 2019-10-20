@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-12"> 
      <ul class="nav nav-tabs" role="tablist">      
        <li class="nav-item">
          <a class="nav-link" href="{{route('job.index')}}">ประกาศรับสมัครงาน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#tabs-2"  role="tab" >ประกาศหางาน</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('resume.index')}}" >เรซูเม่</a>
        </li>       
        <li class="nav-item">
          <a class="nav-link " href="{{url('/user-report')}}">รายงานความไม่เหมาะสม</a>
        </li>
      </ul>
    <div class="tab-pane active" id="tabs-2" role="tabpanel">
    <br>     
      <div class="form-group">          
            <a href="{{route('job-user.create')}}" class="btn btn-outline-primary  btn-lg btn-block">ประกาศหางาน</a>           
        </div>        
        <div class="card">
                <div class="card-body">
                    <table class="table ">
                        <thead class="thead">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่องาน</th>
                            <th scope="col">ชื่อผู้ประกาศ</th>
                            <th scope="col">หมวด</th>    
                            <th scope="col">สถานะ</th>                         
                            <th scope="col">วันที่ประกาศ</th>
                            <th scope="col">วันที่อัปเดท</th>                                   
                            <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user_jobs as $user_job)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td class="text-nowrap"> {{$user_job->title}}</td>
                                <td class="text-nowrap">
                                  @foreach($users as $user)
                                    @if($user_job->user_id == $user->id)
                                        {{ $user->name }}                                  
                                    @endif
                                  @endforeach                                
                                </td>
                                <td> 
                                    @foreach ($user_job->categories as $category)
                                        <a href="">{{ $category->name}} </a>
                                    @endforeach    
                                </td> 
                                <td>
                                  @if($user_job->status != 0)
                                       <p style="color:green;">แสดง </p> 
                                  @else
                                  <p style="color:red;">ไม่แสดง </p> 
                                  @endif
                                </td>                               
                                <td>{{ Carbon\Carbon::parse($user_job->created_at)->format('d/m/Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($user_job->updated_at)->format('d/m/Y') }}</td>                              
                                
                                <td class="text-nowrap">
                                    <!-- Button trigger modal -->
                                    <a type="" class="btn btn-primary" data-toggle="modal" data-target="#Modal2{{$user_job->id}}">ดูข้อมูล</a>
                                    <a href="{{route('job-user.edit',$user_job->id)}}" class="btn btn-success">แก้ไขข้อมูล</a>
                                     
                                    <form id="delete-form-{{ $user_job->id }}" 
                                        action="{{ route('job-user.destroy',$user_job->id) }}" method="post" style="display:none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    </form>

                                    <a href="" onclick="
                                        if(confirm('ต้องการลบ ใช่ หรือ ไม่?'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $user_job->id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">ลบข้อมูล</a>  


                                    <div class="modal fade" id="Modal2{{$user_job->id}}" tabindex="-1" rolse="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle" style="color:#000" >Topic: </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ol style="color:#000">Description : {{$user_job->description}}</ol>
                                            <ol style="color:#000">Category : </ol>
                                            <ol style="color:#000">Create Time :  </ol>
                                            <ol style="color:#000">Updated Time :  </ol>
                                            <ol style="color:#000">Experience : {{$user_job->experience}} </ol>
                                            <ol style="color:#000">Skill : {{$user_job->skill}} </ol>
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
                        {{ $user_jobs->links() }}
                    </div>                                 
                </div>
            </div>
    </div> 
</div>
@endsection