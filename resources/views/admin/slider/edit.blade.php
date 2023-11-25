@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-header">Add Slider
                        </div>
                        <div class="card-body">
                            <form action="{{ url('slider/update/' . $sliders->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $sliders->image }}">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        Slider Title</label>
                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $sliders->title }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        Brand Description </label>
                                    <input type="text" class="form-control" name="description" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $sliders->description }}">
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Update
                                        Slider Image</label>
                                    <input type="file" class="form-control" name="image" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{ $sliders->image }}">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <img src="{{ asset($sliders->image) }}" style="height: 200px; width: 400px; ">
                                </div>
                                <button type="submit">Update Slider </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
