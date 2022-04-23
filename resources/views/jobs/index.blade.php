@extends('layouts.app')
@section('title', 'All jobs')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-left">
                            <a href="/jobs/create" class="btn btn-primary btn-sm float-right ">
                                <i class="fa-solid fa-circle-plus"></i>
                                Create Job
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 pt-3">
                            <ul class="list-group">
                                @foreach ($jobs as $job)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                      <div class="fw-bold">
                                          <div class="job-title">{{ $job->name }}</div>
                                      </div>
                                      <div class="company-name">{{ $job->user->name }}</div>
                                      <p>{{ $job->shift->name }} | {{ $job->location->name }} <span style="color: red;">{{ $job->salary->name }}</span></p>
                                     
                                    </div>
                                    <div class="salary">
                                        Mar-24-2022
                                        <a href="/change_status/{{ $job->id }}" class="btn {{ $job->status==='active' ? 'btn-outline-success' : 'btn-outline-danger' }} btn-sm ml-3">
                                            {{ $job->status }}
                                        </a>
                                        <a href="/jobs/{{ $job->id }}/edit" class="btn btn-outline-warning btn-sm mx-1">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                        
                                        @can('delete', $job)
                                            <form class="float-right" style="display: inline" action="/jobs/{{ $job->id }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        @endcan
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
