@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">Add Brand
                        </div>
                        <div class="card-body">
                            <form action="{{ url('brand/update/' . $brands->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $brands->brand_name }}">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        brand Image</label>
                                    <input type="file" class="form-control" name="brand_image"
                                        value="{{ $brands->brand_image }}">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <img src="{{ asset($brands->brand_image) }}" style="height: 200px; width: 400px; ">
                                </div>
                                <button type="submit">Update Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
