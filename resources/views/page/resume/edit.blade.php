@extends('layouts.app')
@section('content')
<div class="container">
<label for=""> Create Resume</label>
<hr>
            <form action="{{route('resume.update',$resume->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
            <div class="form-group">
                <label for="exampleFormControlInput1">ชื่อผู้สมัคร : </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="name" value="{{$resume->name}}" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">หมวดงานที่สนใจ : </label>
                <select class="form-control" name="categories" required>
                    <option>เลือก . . .</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" @foreach ($resume->categories as $resume_cate)
                                                    @if ($resume_cate->id == $category->id)
                                                    selected
                                                    @endif
                                                @endforeach>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
                
            <div class="form-group">
                <label for="exampleFormControlTextarea2">ประสบการณ์การทำงาน : </label>
                <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="experience" required>{{$resume->experience}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea3">ทักษะในการทำงาน : </label>
                <textarea class="form-control" id="exampleFormControlTextarea3" rows="5" name="skill" required>{{$resume->skill}}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">อัปโหลดไฟล์ : ข้อมูลเพิ่มเติม,ไฟล์เอกสาร</label>
               
                @if($resume->file_url =='')
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file_resume">
                @else
                    <a href="{{asset('uploads/resume/'.$resume->file_url)}}" target="_blank">{{ $resume->file_url }}</a>
                    <input type="hidden" value="$resume->file_url" name="file_resume">    
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file_resume"> 
                @endif     
            
            </div>

            <button class="btn btn-success" type="submit"> save</button>
            <a href="{{route('resume.index')}}" class="btn btn-info">ย้อนกลับ</a>
            </div>
        </div>
      </form>
</div>

@endsection