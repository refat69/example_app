@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Change Password</h2>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}" class="form-pill">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">Current Password</label>
                    <input type="password" class="form-control" name="oldpassword" id="current_password"
                        placeholder="Current password">
                    @error('oldpassword')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">New Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="new Password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword3">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                        placeholder="Confirm Password">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
