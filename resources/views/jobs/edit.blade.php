@extends('layouts.app')
@section('title', 'edit job')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Edit job</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form autocomplete="off" action="/jobs/{{ $job->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control {{ $errors->has('name') ? ' border-danger' : '' }}" name="name" value="{{ $job->name ?? old('name') }}">
                                  <small class="form-text text-danger">{!! $errors->first('name')!!}</small>
                                </div>
                                
                                <div class="form-group mt-2">
                                    <label for="location_id">Job Location</label>
                                    <select class="form-control" name="location_id">
                                        <option selected="" disabled="">Choose location</option>
                                        @foreach ($locations as $location )
                                            <option value="{{ $location->id }}"
                                                @if ($location->id === $job->location->id)
                                                    selected
                                                @endif
                                                
                                                >{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-danger">{!! $errors->first('location_id')!!}</small>
                                </div>


                                <div class="form-group mt-2">
                                    <label for="category_id">Job Category</label>
                                    <select class="form-control" name="category_id">
                                        <option selected="" disabled="">Choose category</option>
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}"
                                                @if ($category->id === $job->category->id)
                                                    selected
                                                @endif
                                                
                                                >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-danger">{!! $errors->first('category_id')!!}</small>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="shift_id">Position nature</label>
                                    <select class="form-control" name="shift_id">
                                        <option selected="" disabled="">Choose nature</option>
                                        
                                        @foreach ($shifts as $shift )
                                            <option value="{{ $shift->id }}"
                                                @if ($shift->id === $job->shift->id)
                                                    selected
                                                @endif
                                                >{{ $shift->name }}</option>
                                        @endforeach
                                       
                                    </select>
                                    <small class="form-text text-danger">{!! $errors->first('shift_id')!!}</small>
                                </div>

                                <div class="form-group mt-2">
                                    <label for="salary_id">Salary</label>
                                    <select class="form-control" name="salary_id">
                                        <option selected="" disabled="">Salay range</option>
                                        @foreach ($salaries as $salary )
                                            <option value="{{ $salary->id }}"
                                                @if ($salary->id === $job->salary->id)
                                                selected
                                                @endif
                                            >{{ $salary->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-danger">{!! $errors->first('salary_id')!!}</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control {{ $errors->has('description') ? ' border-danger' : '' }}" rows="5" name="description">{{$job->description ?? old('description') }}</textarea>
                                    <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
                                </div>

                                <h5 class="header-title">Job Requirements</h5>
                                <div class="form-group mt-2">
                                    <label for="education_id">Education Requirement</label>
                                    <select class="form-control" name="education_id">
                                        <option selected="" disabled="">Choose education</option>
                                        @foreach ($educations as $education )
                                            <option value="{{ $education->id }}"
                                                @if ($education->id === $job->education->id)
                                                    selected
                                                @endif
                                                >{{ $education->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-danger">{!! $errors->first('education_id')!!}</small>
                                </div>

                                <div class="form-group">
                                    <label for="requirement">Requirement</label>
                                    <textarea class="form-control {{ $errors->has('requirement') ? ' border-danger' : '' }}" rows="5" name="requirement">{{$job->requirement ?? old('requirement') }}</textarea>
                                    <small class="form-text text-danger">{!! $errors->first('requirement') !!}</small>
                                </div>

                                <a href="/home" type="submit" class="btn btn-secondary mt-3">Cancel</a>
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                            </form>
                                
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection