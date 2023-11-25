@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Contact
                        </div>
                        <div class="card-body">
                            <form action="{{ url('contact/update/' . $contacts->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        Contact Addres</label>
                                    <input type="text" class="form-control" name="address" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $contacts->address }}">
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        Contact Email </label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $contacts->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        Contact Phone </label>
                                    <input type="text" class="form-control" name="description" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $contacts->phone }}">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit">Update Contact</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
