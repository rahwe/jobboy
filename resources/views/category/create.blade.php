@extends('layouts.app')
@section('title', 'Add new category')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Add new category</div>

                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form autocomplete="off" action="/categories" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="cat_name">Category name</label>
                                  <input type="text" class="form-control {{ $errors->has('cat_name') ? ' border-danger' : '' }}" name="cat_name" value="{{ old('cat_name') }}">
                                  <small class="form-text text-danger">{!! $errors->first('cat_name')!!}</small>
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