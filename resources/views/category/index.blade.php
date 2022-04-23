@extends('layouts.app')
@section('title', 'All Category')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-left">
                            <a href="/categories/create" class="btn btn-primary btn-sm float-right ">
                                <i class="fa-solid fa-circle-plus"></i>
                                Create Category
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 pt-3">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Category</th>
                                      <th scope="col">Post Count</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($categories as $cat )
                                      <tr>
                                        <td>{{ $cat->id }}</td>
                                        <td>{{ $cat->name }}</td>
                                        <td>{{ $cat->jobs->count() }}</td>
                                        <td>
                                            <a href="/categories/{{ $cat->id }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
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
    </div>
</div>
@endsection
