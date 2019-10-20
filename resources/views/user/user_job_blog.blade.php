@extends('layouts.app')
@section('content')

<div class="container">      
  @foreach($user_jobs as $job)
    
    <div class="card text-center" style="width: 18rem;">
      <div class="card-body">
        <img src="{{asset('uploads/file/'.$job->img_url)}}" alt="Avatar" class="avatar" width="100" height="100">
        <h5 class="card-title">สนใจงาน : {{ $job->title }}</h5> 

        <!-- <a href="" class="btn btn-warning" >
            หมวด : 
            <span class="sr-only">unread messages</span>
        </a> -->


        <p class="card-text">รายละเอียดของงาน :  {{ $job->description }}</p>
        <p class="card-text">ประสบการณ์การทำงาน : {{ $job->experience }}</p>
        <p class="card-text">ทักษะในการทำงาน : {{ $job->skill }}</p>
        <p class="card-text">เงินเดือน :{{ $job->salary }}</p>
        <a href="" class="btn btn-warning" >อ่านเพิ่มเติม<span class="sr-only">unread messages</span>
        </a>
      </div>
     <p> tag :  @foreach($job->categories as $category)
                    <a href="">{{ $category->name }}</a>    
            @endforeach
            </p>
    </div>
  @endforeach
</div>

@endsection