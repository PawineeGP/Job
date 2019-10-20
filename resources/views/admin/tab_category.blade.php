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
                <a class="nav-link active" data-toggle="tab" href="#tabs-3" role="tab">ประเภทงาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{url('/admin-dasboard-report')}}">รายงานความไม่เหมาะสม</a>
            </li>
        </ul>
    <!-- Tab 1 panes -->
    <br>
    <div class="tab-content">   
     <!-- Category list -->
        <div class="tab-pane active" id="tabs-3" role="tabpanel">
                       
            <div class="form-group">              
                <a href="{{route('category.create')}}"  class="btn btn-outline-primary  btn-lg btn-block">เพิ่ม ประเภทงาน</a>                       
            <br>
            <label for="">ประเภทงาน : <mat-tab label="TabHeader"></mat-tab> </label>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-dark">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">ชื่องาน</th>
                            <th scope="col">URL</th>
                            <th scope="col">วันที่ประกาศ</th>
                            <th scope="col">วันที่อัปเดท</th>                                   
                            <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{$loop->index+1}}</th>
                                <td class="text-nowrap">{{$category->name}}</td>
                                <td class="text-nowrap">{{$category->url}} </td>
                                <td>{{ Carbon\Carbon::parse($category->created_at)->format('d/m/Y') }}</td>
                                <td>{{ Carbon\Carbon::parse($category->updated_at)->format('d/m/Y') }}</td> 

                                <td class="text-nowrap">                                          
                                    <a type="" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{ $category->id}}">ดูข้อมูล</a>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-success">แก้ไขข้อมูล</a>
                                    
                                    <form id="delete-form-{{ $category->id }}" 
                                        action="{{ route('category.destroy',$category->id) }}" method="post" style="display:none">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    </form>

                                    <a href="" onclick="
                                        if(confirm('ต้องการลบข้อมูล ใช่ หรือ ไม่'))
                                        {
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{ $category->id }}').submit();
                                        }
                                        else
                                        {
                                            event.preventDefault();
                                        }" class="btn btn-danger">ลบข้อมูล</a>
                                    <!-- MODAL -->
                                    <div class="modal fade" id="Modal{{$category->id}}" tabindex="-1" rolse="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalScrollableTitle" style="color:#000" >Topic: </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <ol style="color:#000">name :{{ $category->name }} </ol>
                                                    <ol style="color:#000">url : {{ $category->url }}</ol>                                                   
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
                        {{$categories->links()}}
                    </div>                                 
                </div>
            </div>
        </div>
        <!-- end tab 3 -->
      
    </div>

@endsection