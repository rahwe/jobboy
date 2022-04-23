@extends('frontend.app')
@section('title', $category->name)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    {{ $category->name }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pt-3">
                            @if (count($jobs))
                            <ul class="list-group">
                                @foreach ($jobs as $job)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                      <div class="fw-bold">
                                          <a href="/job_detail/{{ $job->id }}" class="job-title">{{ $job->name }}</a>
                                      </div>
                                      <a href="/company_detail/{{ $job->user->id }}" class="company-name">{{ $job->user->name }}</a>
                                      <p>{{ $job->shift->name }} | Phnom Penh <span style="color: red;">{{ $job->salary->name }}</span></p>
                                     
                                    </div>
                                    <div class="salary">
                                        Mar-24-2022
                                        <div class="btn btn-outline-info ml-3">Apply Now</div>
                                    </div>
                                  </li>
                                @endforeach
                                
                              </ul>
                            @else
                              <h5> There not jobs yet in this category</h5>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
