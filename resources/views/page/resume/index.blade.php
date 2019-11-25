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
          <a class="nav-link  active" href="#tabs-3" role="tab">เรซูเม่</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{url('/user-report')}}" >รายการแจ้งความไม่เหมาะสม</a>
        </li>
      </ul>
    <div class="tab-pane active" id="tabs-3" role="tabpanel">
    <br>
        <div class="form-group">          
            <a href="{{route('resume.create')}}" class="btn btn-outline-primary  btn-lg btn-block">เพิ่ม เรซูเม่</a>           
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table ">Resume :
                    <thead class="thead">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">ชื่อผู้ประกาศ</th> 
                        <th scope="col">หมวด</th>
                        <th scope="col">วันที่ประกาศ</th>
                        <th scope="col">วันที่อัปเดท</th>                              
                        <th scope="col">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>                                
                        @foreach($resumes as $resume)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td class="text-nowrap">{{ $resume->name}}</td>
                            <td>  @foreach ($resume->categories as $category)
                                        <a href="">{{ $category->name}} </a>
                                    @endforeach     
                            </td>
                            <td class="text-nowrap">{{ $resume->created_at}}</td>
                            <td class="text-nowrap">{{ $resume->updated_at}}</td>
                        
                            <td class="text-nowrap">
                            <!-- show data  -->
                            <a href="{{url('/downloadPDF/'.$resume->id)}}" class="btn btn-info">ดาวน์โหลด</a>
                            <a href="" class="btn btn-warning" data-toggle="modal" data-target="#Modal{{$resume->id}}">ดูข้อมูล</a>                            
                            <a href="{{route('resume.edit',$resume->id)}}" class="btn btn-success">แก้ไขข้อมูล</a>
                            <form id="delete-form-{{ $resume->id }}" 
                                        action="{{ route('resume.destroy',$resume->id) }}" method="post" style="display:none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    </form>

                                    <a href="" onclick="
                                        if(confirm('ต้องการลบข้อมูล ใช่ หรือ ไม่'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $resume->id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">ลบข้อมูล</a>

                                    <div class="modal fade" id="Modal{{$resume->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title " id="exampleModalScrollableTitle" style="color:#000">{{$resume->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" >
                                                    <ol style="color:#000">ชื่อ - นามสกุล :  {{$resume->name}}</ol>                                                   
                                                    <ol style="color:#000">ประสบการณ์ :  {{$resume->experience}}</ol>
                                                    <ol style="color:#000">ทักษะ :  {{$resume->skill}}</ol>
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
            </div>
        </div>
    </div> 
</div>
@endsection