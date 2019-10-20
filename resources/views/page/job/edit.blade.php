@extends('layouts.app')
@section('content')
<div class="container">
 <label for="">Create Job</label>
 <hr>
      <form method="POST" action="{{ route('job.update',$job->id)}}" enctype="multipart/form-data">
          @csrf
          {{method_field('PUT')}}


      <div class="form-group">
        <label for="exampleFormControlInput1">หัวข้อการประกาศ : </label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title" name="title" value="{{ $job->title }}" required>
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">หมวดงานที่ประกาศ : </label>
          <select class="form-control" name="categories[]">
            <option>เลือก . . .</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @foreach ($job->categories as $job_cate)
                                                    @if ($job_cate->id == $category->id)
                                                    selected
                                                    @endif
                                                @endforeach
                      >{{$category->name}}</option>
            @endforeach
          </select>
      </div>
  
      <div class="form-group">
        <label for="exampleFormControlTextarea1">รายละเอียดของานงาน : </label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"  required>{{ $job->description }}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea2">ประสบการณ์การทำงาน : </label>
        <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="experience" required>{{ $job->experience }}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlTextarea3">ทักษะในการทำงาน : </label>
        <textarea class="form-control" id="exampleFormControlTextarea3" rows="5" name="skill" required>{{ $job->skill }}</textarea>
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">อัปโหลดไฟล์ : รูปภาพประกอบ,โลโก้บริษัท</label>
        <br>
          @if($job->img_url =='')
            <input type="file" class="form-control-file" name="filejob">
          @else
            <a href="{{asset('uploads/file/'.$job->img_url)}}" target="_blank">{{ $job->img_url }}</a>
            <input type="hidden" value="$job->img_url" name="filejob">    
            <input type="file" class="form-control-file" name="filejob">       
          @endif      
      </div>
      
   
    <div class="form-group">
        <div class="demo-checkbox">
        <input type="checkbox" id="md_checkbox_31" class="filled-in chk-col-light-green" 
                                                    name="status"  value="1" @if($job->status == 1) 
                                                    {{'checked '}}
                                                    @endif>
                                                    <label for="md_checkbox_31">Publish</label>   

                     
        </div>
    </div>
     
      <button class="btn btn-success" type="submit"> save</button>
      <a href="{{url('post/show')}}" class="btn btn-info">ย้อนกลับ</a>
    </form>
</div>

@endsection