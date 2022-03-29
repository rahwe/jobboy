@extends('layouts.app')
@section('title', 'All jobs')
@section('content')
<div class="container">
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
                            <ul class="list-group">
                                @foreach ($categories as $cat)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                      <div class="fw-bold">
                                          <a href="" class="job-title">{{ $cat->cat_name }}</a>
                                      </div>
                                      
                                    </div>
                                    <div class="salary">
                                        Mar-24-2022
                                    </div>
                                  </li>
                                @endforeach
                                
                              </ul>
                        </div>
                    </div>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
