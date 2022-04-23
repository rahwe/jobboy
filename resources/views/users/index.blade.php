@extends('layouts.app')
@section('title', 'All User')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pt-3">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Post Count</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($users as $user )
                                      <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->jobs->count() }}</td>
                                        <td>
                                            <a href="/users/{{ $user->id }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
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
