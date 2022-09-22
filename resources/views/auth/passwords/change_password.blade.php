@extends('layouts.userLayout')
@section('content')
<div class="container">
            <div class="row justify-content-center">
    <div class="col-lg-8">

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Change Password</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('password.update') }}" method="POST" class="form-pill">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="password">Current Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                        @error('current_password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="New Password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group mb-3">
                        <label for="password-confirm">Confirm Password</label>
                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirm Password">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-default">Save</button>
                </form>
            </div>
        </div>

    </div>

@endsection
