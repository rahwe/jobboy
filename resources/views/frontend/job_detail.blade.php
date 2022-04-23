@extends('frontend.app')
@section('title', 'Job detail')
@section('content')
<div class="container-width">
    <div class="container">
        <div class="row">
            <div class="col-8">
         
                <div class="card-body">
                    <h2 class="name">{{ $job->name }}</h2>
                    <div class="company d-flex">
                        <img src="{{ asset('image/slide.jpg') }}" alt="" class="company-profile">
                        <h3><a href="" class="company-name m-5">{{ $job->user->name }}</a></h3>
                    </div>
                </div>
              
            </div>
            <div class="col-4 pt-3">
                <p class="publish-date">Publish Date: Mar-30-2022</p>
                <p class="publish-date">Closing Date: Mar-30-2022</p>
                <div class="btn btn-outline-info">
                    <i class="fa-solid fa-star"></i>
                    Save
                </div>
                <div class="btn btn-outline-primary">Apply Now</div>
            </div>
        </div>
        <div class="row justify-content-left">
            <div class="col-6">
                <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <th scope="row">Level</th>
                        <td></td>
                        <th scope="row">Term</th>
                        <td>{{ $job->shift->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Year of Exp</th>
                        <td></td>
                        <th scope="row">Function</th>
                        <td>{{ $job->category->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row">Hiring</th>
                        <td></td>
                        <th scope="row">Industry</th>
                        <td></td>
                      </tr>
                      <tr>
                        <th scope="row">Salary</th>
                        <td>{{ $job->salary->name }}</td>
                        <th scope="row">Qualification</th>
                        <td>{{ $job->education->name }}</td>
                      </tr>
                      
                      
                    </tbody>
                  </table>
            </div>
        </div>

    </div>
    
</div>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <h4 class="card-header">Job Description</h4>
                <div class="card-body">
                    <p>
                        {{ $job->description }}
                    </p>
                </div>
                <h4 class="card-header">Job Requirement</h4>
                <div class="card-body">
                    <p>
                        {{ $job->requirement }}
                    </p>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-header">
                    Company Profile
                </div>
                <div class="card-body">
                    Techbodia is a software company that develops tailor-made software solutions for our global clientele, empowering them in their quest to be the industry leaders. Yes, we develop full IT solutions for our clients. Fire and forget - that's not our style. Our approach is to always inspect and adapt! We are passionate in our work and are continuously improving not just our products, but also our processes and most importantly, ourselves!
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Contact Information
                </div>
                <div class="card-body">
                    <div class="left-profile d-flex justify-content-left">
                        <img src="{{ asset('image/hr.png') }}" alt="" class="img-fluid">
                        <p>{{ $job->user->name }}
                            Postion
                        </p>
                        
                    </div>
                </div>
            </div>

        </div>
        <div class="col-4">
            <div class="company-profile pt-3">
                <img src="{{ asset('image/slide.jpg') }}" class="img-fluid" alt="company profile">
                <h5 class="pt-2"><i class="fa-solid fa-building-circle-check"></i> {{ $job->user->name }}</h5>
                <p><i class="fa-brands fa-windows"></i> {{ $job->category->name }}</p>
                <p><i class="fa-solid fa-location-dot"></i> Village No 14,Sam Dach Hun Sen Road ,Tonle Bassac Commune , Chamkarmorn District, Phnom Penh City, Kingdom of Cambodia.</p>
            </div>
            <div class="card">
                <div class="card-header">Hot jobs</div>
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
