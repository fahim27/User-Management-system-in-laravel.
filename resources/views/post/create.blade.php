@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                     <div class="row">
                      <div class="col-lg-6">
                       <h3>Add Post</h3>      
                    </div>  
                    <div class="col-lg-6 text-right">
                        <a class="btn btn-success" href="{{route('post.create')}}">Add</a>    
                    </div>  
                    </div>
                </div>

                <div class="card-body">
                   
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf
                        <div class="form-group">

                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="title" name="title">
                        </div>

                        <div class="form-group">

                            <label>Title</label>
                            <textarea name="description" class="form-control" placeholder="title">
                            </textarea>
                        </div>

                        <button class="btn btn-success" type="submit" style="width: 100%;">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection