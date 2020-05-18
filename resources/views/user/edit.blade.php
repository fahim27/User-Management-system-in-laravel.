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
                        <a class="btn btn-success" href="{{route('user.index')}}">Back</a>    
                    </div>  
                    </div>
                </div>

                <div class="card-body">
                   
                    <form action="{{ route('user.update',$user->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">

                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="title" name="name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">

                            <label>Phone</label>
                            <input type="text" class="form-control" placeholder="title" name="email" value="{{ $user->email }}">
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label>Available Role</label><br/>
                            @foreach ($roles as $role)
                                
                           
                            <label><input type="checkbox" value="{{ $role->id }}" name='role[]' @if($user->hasRole($role))  checked @endif>{{ $role->name }}</label><br/>
                            @endforeach
                          </div>

                        <button class="btn btn-success" type="submit" style="width: 100%;">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection