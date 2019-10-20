@extends('layouts.app')
@section('content')

<div class="container">
<div class="card">
<div class="card-header">Add Category
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
       -->

       <form action="{{route('category.store')}}" method="POST">
       @csrf
            <div class="row">
                <div class="col">หมวด :
                    <input type="text" class="form-control" placeholder="Name" name="name">
                </div>
                <div class="col">URL :
                    <input type="text" class="form-control" placeholder="Url" name="url">
                </div>
            </div>
            <br>
            <div class="text-center">
            <button type="submit" class="btn btn-outline-primary">Add</button>
            </div>
        </form>
    </blockquote>
  </div>
</div>
</div>
@endsection