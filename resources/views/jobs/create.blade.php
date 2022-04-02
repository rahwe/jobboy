@extends('layouts.app')
@section('title', 'Add new job')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Add new job</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form autocomplete="off" action="/jobs" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control {{ $errors->has('name') ? ' border-danger' : '' }}" name="name" value="{{ old('name') }}">
                                  <small class="form-text text-danger">{!! $errors->first('name')!!}</small>
                                </div>
                                <div class="form-group mt-2">
                                    <select class="form-control" name="category_id">
                                        <option selected="" disabled="">Choose category</option>
                                        @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="form-text text-danger">{!! $errors->first('category_id')!!}</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control {{ $errors->has('description') ? ' border-danger' : '' }}" rows="3" name="description">{{ old('description') }}</textarea>
                                    <small class="form-text text-danger">{!! $errors->first('description') !!}</small>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection