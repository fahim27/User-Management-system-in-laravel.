@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                     <div class="row">
                      <div class="col-lg-6">
                       <h3>Edit Role</h3>      
                    </div>  
                    <div class="col-lg-6 text-right">
                        <a class="btn btn-success" href="{{route('role.index')}}">Back</a>    
                    </div>  
                    </div>
                </div>

                <div class="card-body">
                   
                    <form action="{{ route('role.update',$role->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="form-group">

                            <label>Title</label>
                            <input type="text" class="form-control" placeholder="title" name="title" value="{{ $role->name }}">
                        </div>
                        <div class="form-group">
                            <label>Available permission</label><br/>
                            @foreach ($permissions as $permission)
                                
                           
                            <label><input type="checkbox" value="{{ $permission->id }}" name='permissions[]'  @if ($role->hasPermissionTo($permission->id)) checked  @endif>{{ $permission->name }}</label><br/>
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