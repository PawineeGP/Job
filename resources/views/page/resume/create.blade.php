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
                <label for="exampleFormControlInput1">email: </label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{Auth::user()->email}}" value="{{Auth::user()->email}}" name="email" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">สัญชาติ: </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nationality" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">รูปแบบงานที่สนใจ: </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="attention" required>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">เพศ </label>
                <select class="form-control" name="sex" required>
                    <option>เพศ</option>                    
                    <option value="0">ชาย</option>
                    <option value="1">หญิง</option>
                </select>
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
                <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="experience"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea2">ประวัติการศึกษา : </label>
                <textarea class="form-control" id="exampleFormControlTextarea2" rows="4" name="education" required></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea3">ทักษะในการทำงาน : </label>
                <textarea class="form-control" id="exampleFormControlTextarea3" rows="5" name="skill" required></textarea>
            </div>

            <!-- <div class="form-group">
                <label for="exampleFormControlFile1">อัปโหลดไฟล์ : ข้อมูลเพิ่มเติม,ไฟล์เอกสาร,ผลงาน</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file_resume">
            </div> -->
            <div class="form-group">
                <div class="demo-checkbox">
                        <input type="checkbox" id="md_checkbox_31" class="filled-in chk-col-light-green" name="status" value="1">
                        <label for="md_checkbox_31">Publish</label>          
                </div>
            </div>

            <button class="btn btn-success" type="submit"> save</button>
            <a href="{{route('resume.index')}}" class="btn btn-info">ย้อนกลับ</a>
            </div>
        </div>
      </form>
</div>

@endsection