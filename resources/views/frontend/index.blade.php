@extends('frontend.app')
@section('title', 'Jobboy')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-8">
            <div class="card">
                <div class="card-header">I'm looking for ...</div>
                <div class="card-body">
                    <div class="all-job-info">
                        <h5>All Jobs</h5>|
                        <p>ដំណឹងជ្រើសរើសបុគ្គលិកជាភាសាខែ្មរ</p>|
                        <p>中文招聘</p>
                        <p class="draf">More than {{ $jobs->count() }} jobs, {{ $users->count() }} job seekers</p>
                    </div>
                    
                    <form>
                        <div class="row">
                            <div class="form-group col-4 pr-0">
                                <select id="inputState" class="form-select" aria-label="location">
                                    <option selected="" disabled="">Job--Loctions</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>   
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group col-8 pl-0">
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                        </div>
                        <div type="submit" class="btn-search"><i class="fa-solid fa-magnifying-glass"></i></div>
                    </form>
                   
                    
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    browse jobs
                </div>
                <div class="card-body">
                   @foreach ($categories as $cat)
                        <a href="/all_list_by_category/{{ $cat->id }}" class="btn btn-link">{{ $cat->name }}({{ $cat->jobs->count() }})</a>  
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 pt-3">
                            <ul class="list-group">
                                @foreach ($jobs as $job)
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                      <div class="fw-bold">
                                          <a href="/job_detail/{{ $job->id }}" class="job-title">{{ $job->name }}</a>
                                      </div>
                                      <a href="/company_detail/{{ $job->user->id }}" class="company-name">{{ $job->user->name }}</a>
                                      <p> {{ $job->shift->name }} |  {{ $job->location->name }} <span style="color: red;">{{ $job->salary->name }}</span></p>
                                     
                                    </div>
                                    <div class="salary">
                                        Mar-24-2022
                                        <div class="btn btn-outline-info ml-3">Apply Now</div>
                                    </div>
                                  </li>
                                @endforeach
                                
                              </ul>

                        </div>
                    </div>
                </div>

            </div>
            
            <div class="d-flex">
                {!! $jobs->links() !!}
            </div>
            <div class="card">
                <div class="card-header">
                    <p class="underline">Featured Employers</p>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Urgent Jobs</h5>
                    <a href="" class="login-employer">See more ></a>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="http://">Job title</a>
                             &minus;
                            <a href="http://" style="color: #ff0000;">CampanyName</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
