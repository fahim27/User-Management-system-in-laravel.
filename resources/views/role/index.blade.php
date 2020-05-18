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
                        @role('Publisher')
                        <a class="btn btn-success" href="{{route('role.create')}}">Add</a>    
                        @endrole
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
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $k=> $role)
                                
                           
                          <tr>
                            <th scope="row">{{ $k+1 }}</th>
                            <td>{{ $role->name }}</td>
                            
                            <td>

                                <a class="btn btn-success text-white" href="{{route('role.edit',$role->id)}}">Edit</a>
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