@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add Service
                        </div>
                        <div class="card-body">
                            <form action="{{ url('service/update/' . $services->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        Service Title</label>
                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $services->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        Short Description </label>
                                    <input type="text" class="form-control" name="short_des" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $services->short_des }}">
                                    @error('short_des')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit">Update Service </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
