@extends('layouts.app')
@section('content')
<div class="container">
<label for=""> Create Resume</label>
<hr>
            <form action="{{route('resume.store')}}" method="post" enctype="multipart/form-data">
                @csrf

            <div class="form-group">
                <label for="exampleFormControlInput1">ชื่อ-นามสกุล: </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="name" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">หมวดงานที่สนใจ : </label>
                <select class="form-control" name="categories" required>
                    <option>เลือก . . .</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
                
            <div class="form-group">
                <label for="exampleFormControlTextarea2">ประสบการณ์การทำงาน : </label>
                <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="experience" required></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea3">ทักษะในการทำงาน : </label>
                <textarea class="form-control" id="exampleFormControlTextarea3" rows="5" name="skill" required></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1">อัปโหลดไฟล์ : ข้อมูลเพิ่มเติม,ไฟล์เอกสาร</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file_resume" required>
            </div>

            <button class="btn btn-success" type="submit"> save</button>
            <a href="{{route('resume.index')}}" class="btn btn-info">ย้อนกลับ</a>
            </div>
        </div>
      </form>
</div>

@endsection