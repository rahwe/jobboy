@extends('layouts.app')
@section('title', 'Add new category')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">Add new category</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <form autocomplete="off" action="/categories" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label for="name">Category name</label>
                                  <input type="text" class="form-control {{ $errors->has('name') ? ' border-danger' : '' }}" name="name" value="{{ old('name') }}">
                                  <small class="form-text text-danger">{!! $errors->first('name')!!}</small>
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