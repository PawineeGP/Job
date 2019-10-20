@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    ข้อมูลรับสมัครงานเพิ่มเติม
                    @if($job->user_id == Auth::user()->id)
                    
                    @else
                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#Modal{{$job->id}}">แจ้งความไม่เหมาะสม</a> 
                    @endif 
                </div>

                <div class="card-body">                 

                        <div class="text-center">
                            @if($job->img_url == null)
                            <img src="data:image/png;base64,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" class="rounded" alt="...">
                            @else
                            <img src="{{asset('uploads/file/'.$job->img_url)}}" class="rounded" alt="..." width="300" height="300">
                            @endif
                        </div>
                        <br>                    
                  
                        <div class="form-group row">
                            <label for="title"  class="col-md-4 col-form-label text-md-right">ชื่องาน : {{ $job->title }}</label>                           
                        </div>

                        <div class="form-group row">
                            <label for=""  class="col-md-4 col-form-label text-md-right">experience :</label>                         
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Address :</label>
                        </div>     

                        <div class="form-group row">
                        @foreach($comments as $comment)
                            @foreach($users as $user)
                                @if($comment->user_id == $user->id)
                                {{$user->name}}:  {{ $comment->comment }}
                                @endif
                            @endforeach
                        @endforeach
                        </div>
                        <form action="{{route('comment.store')}}" method="post">
                        @csrf
                        <input type="hidden" value="{{$job->id}}" name="job_id">
                            <div class="form-group row">
                                <textarea name="comment" id="" cols="30" rows="10"></textarea>
                            </div>
                            <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">comment</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
    <div class="modal fade" id="Modal{{$job->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="exampleModalScrollableTitle" style="color:#000">{{$job->title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/report')}}" method="post"> 
                @csrf
                    <div class="modal-body" >
                        <input type="hidden" name="job_title" value="{{ $job->title }}">
                        <input type="hidden" name="user_id" value="{{ $job->user_id }}">
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea2">แจ้งความไม่เหมาะสม: </label>
                            <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="report" required></textarea>
                        </div>                                 
                                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>       
                        <button type="submit" class="btn btn-success">Save</button>                           
                    </div>
                </form>   
            </div>
        </div>
    </div>
<!-- end modal -->
@endsection
