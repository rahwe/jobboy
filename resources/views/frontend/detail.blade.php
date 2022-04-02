@extends('layouts.app')
@section('title', 'Job detail')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="company">{{ $job->user->name }}</div>
                    <div class="name">{{ $job->name }}</div>
                    <div class="description">{{ $job->description }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
