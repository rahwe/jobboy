@extends('frontend.app')
@section('title', 'Company profile')
@section('content')
<div class="container-width">
    <div class="container">
        <div class="row">
            <div class="col-8">
         
                <div class="card-body">
                    <h2 class="name"></h2>
                    <div class="company d-flex">
                        <img src="{{ asset('image/company_profile.jpg') }}" alt="" class="company-profile">
                        <h3>{{ $user->name }}</h3>
                    </div>
                </div>
              
            </div>
            <div class="col-4 pt-3">
                <h5>{{ $user->jobs->count() }} Active jobs</h5>
                <div class="btn btn-outline-info">
                    <i class="fa-solid fa-star"></i>
                    Save
                </div>
            </div>
        </div>
       

    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    Company profile
                </div>
                <div class="card-body">
                    Zillennium is a leading Real Estate Marketplace—a convenient and smart property trading platform of choice.

More than just a platform, we provide one-stop shop integrated solutions for property-related decisions—which we believe is a crucial ecosystem to support socio-economic development in emerging markets.

                </div>

                <div class="card-header">
                    Website
                </div>
                <div class="card-body">
                    https://www.zillennium.com
                </div>

                <div class="card-header">
                    Location
                </div>
                <div class="card-body">
                    #50, Corner of Street 516 and 317, Sangkat Boengkak 1, Khan Tuolkok 12151 Phnom Penh Cambodia
                </div>
                <div class="card-header">
                    Contact Information
                </div>
                <div class="card-body">
                    <div class="left-profile d-flex justify-content-left">
                        <img src="{{ asset('image/hr.png') }}" alt="" class="img-fluid">
                        <p>sdfasdfa
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
