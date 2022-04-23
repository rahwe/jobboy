@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 pt-3">

                            <img src="/image/{{ $user->avatar }}" alt="" style="width: 150px; height: 150px; border-radius: 50%; margin-right: 50px;">

                            <form autocomplete="off" action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="file" name="avatar" value="{{ $user->avatar ?? old('avatar') }}">
                                </div>

                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" class="form-control {{ $errors->has('name') ? ' border-danger' : '' }}" name="name" value="{{ $user->name ?? old('name') }}">
                                  <small class="form-text text-danger">{!! $errors->first('name')!!}</small>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Update profile</button>
                            </form>
                        </div>
                    </div>
                    

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
