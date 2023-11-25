@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Add about
                        </div>
                        <div class="card-body">
                            <form action="{{ url('about/update/' . $homeabout->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        About Title</label>
                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $homeabout->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        Short Description </label>
                                    <input type="text" class="form-control" name="description" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $homeabout->short_dis }}">
                                    @error('short_dis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        long Description </label>
                                    <input type="text" class="form-control" name="description" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $homeabout->long_dis }}">
                                    @error('long_dis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit">Update About </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
