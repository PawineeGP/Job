@extends('layouts.app')
@section('content')

<div class="container">      
  @foreach($jobs as $job)
    
    <div class="card text-center" style="width: 18rem;">
      <div class="card-body">
        <img src="{{asset('uploads/file/'.$job->img_url)}}" alt="Avatar" class="avatar" width="100" height="100">
        <h5 class="card-title">{{ $job->title }}</h5>
    

        <a href="" class="btn btn-warning" >
            หมวด : @foreach($job->categories as $category)
                        {{ $category->name }}
                    @endforeach
            <span class="sr-only">unread messages</span>
        </a>


        <p class="card-text">{{ $job->description }}</p>
        <a href="{{url('/job-detail/'.$job->id)}}" class="btn btn-warning" >อ่านเพิ่มเติม<span class="sr-only">unread messages</span>
        </a>
      </div>
    </div>
  @endforeach
</div>

@endsection