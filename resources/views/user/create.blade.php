@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                     <div class="row">
                      <div class="col-lg-6">
                       <h3>Add Role</h3>      
                    </div>  
                    <div class="col-lg-6 text-right">
                        @role('adminn')
                        <a class="btn btn-success" href="{{route('user.index')}}">Add</a> 
                        @endrole   
                    </div>  
                    </div>
                </div>

                <div class="card-body">
                   
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label> Name</label>
                            <input type="text" class="form-control" placeholder="title" name="name">
                        </div>


                        <div class="form-group">
                            <label> Email</label>
                            <input type="email" class="form-control" placeholder="title" name="email">
                        </div>
                    

                        <div class="form-group">
                            <label> password</label>
                            <input type="password" class="form-control" placeholder="title" name="password">
                        </div>

                        <div class="form-group">

                            <label>Role</label>
                            <br/>
                            @foreach ($roles as $role )
                                <label><input type="checkbox" value="{{ $role->id }}" name="role_id[]">{{ $role->name }}</label>
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