@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                     <div class="row">
                      <div class="col-lg-6">
                       <h3>Post</h3>      
                    </div>  
                    <div class="col-lg-6 text-right">
                        @can('publish post')
                       
                        <a class="btn btn-success" href="{{route('post.create')}}">Add</a> 
                        @endcan   
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
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $k=> $post)
                                
                           
                          <tr>
                            <th scope="row">{{ $k+1 }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->description }}</td>
                            <td>

                                @role('edit post')
                                <a class="btn btn-success" href="{{ route('post.edit',$post->id) }}">Edit</a>
                                @endrole
                                <a class="btn btn-danger" href="{{ route('post.edit',$post->id) }}">Delete</a>

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