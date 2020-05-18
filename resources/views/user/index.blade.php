@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                     <div class="row">
                      <div class="col-lg-6">
                       <h3>Role</h3>      
                    </div>  
                    <div class="col-lg-6 text-right">
                        @hasrole('Publisheer')
                        <a class="btn btn-success" href="{{route('user.create')}}">Add</a>
                        @endhasrole   
                    </div>  
                    </div>
                </div>

                <div class="card-body">

                                    

                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif


                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $k=> $user)
                                
                           
                          <tr>
                            <th scope="row">{{ $k+1 }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            
                            <td>

                                <a class="btn btn-success text-white" href="{{route('user.edit',$user->id)}}">Edit</a>
                                <a class="btn btn-danger text-white">Delete</a>

                            </td>
                          </tr>
                          @endforeach
                        
                        </tbody>
                      </table>
                      
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection