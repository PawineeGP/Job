@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-12"> 
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">จัดการรายชื่อสมาชิก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin-dasboard-job')}}" >จัดการงานที่ประกาศ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/admin-dasboard-category')}}">ประเภทงาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('/admin-dasboard-report')}}">รายงานความไม่เหมาะสม</a>
            </li>
        </ul>
    <!-- Tab 1 panes -->
    <br>
    <div class="tab-content">     
        <!-- User list -->
        <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <form action="" method="post">
            @csrf
                <div class="form-group">
                    <label for="">รายชื่อสมาชิก : </label>
                    <a href="{{route('user-profile.create')}}" class="btn btn-outline-primary  btn-lg btn-block">Add Member</a>          
                </div>

                <div class="card">
                    <div class="card-body">
                    <table class="table table-dark">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่อ- นามสกุล</th>
                            <th scope="col">วันที่ประกาศ</th>
                            <th scope="col">อัปเดทล่าสุด</th>
                            <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->index+1}}</th>
                                <td>{{$user->name }}</td>
                                <td>{{ Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($user->updated_at)->format('d/m/Y') }}</td>
                                <td>
                                    
                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#Modal{{$user->id}}">ดูข้อมูล</a>                           
                                    <a href="" class="btn btn-success">แก้ไขข้อมูล</a>
                                    
                                    <form id="delete-form-{{ $user->id }}" 
                                        action="{{ route('user-profile.destroy',$user->id) }}" method="post" style="display:none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    </form>

                                    <a href="" onclick="
                                        if(confirm('ต้องการลบข้อมูล ใช่ หรือ ไม่'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $user->id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">ลบข้อมูล</a>


                                    
                                    <div class="modal fade" id="Modal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title " id="exampleModalScrollableTitle" style="color:#000">{{$user->name}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" >
                                            <ol style="color:#000">Email :  {{$user->email}}</ol>
                                            <ol style="color:#000">Lind_id :  {{$user->line_id}}</ol>
                                            <ol style="color:#000">Phoneumber :  {{$user->phonumber}}</ol>
                                            <ol style="color:#000">Address :  {{$user->address}}</ol>
                                            <ol style="color:#000">Status :  {{$user->status}}</ol>
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
                        {{$users->links()}}
                        </div>                        
                    </div>
                </div>       
        </div>  
      
    </div>

@endsection