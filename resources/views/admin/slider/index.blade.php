@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <h1>Home Slider</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All Slider
                            <a href="{{ route('add.slider') }}" class="btn btn-info float-right">Add Slider</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL NO</th>
                                    <th scope="col" width="15%">Slider Title</th>
                                    <th scope="col" width="15%">Slider Description</th>
                                    <th scope="col" width="15%">Slider Image</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td><img src="{{ asset($slider->image) }}" style="height: 40px; width: 70px; "></td>

                                        <td>
                                            <a href="{{ url('slider/edit/' . $slider->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('slider/delete/' . $slider->id) }}"
                                                onclick="return confirm('Are you sure to delete')"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $sliders->links() }} --}}
                    </div>
                </div>
                {{-- <div class="col-md-4">
                    <div class="card">

                        <div class="card-header">Add Slider
                        </div>
                        <div class="card-body">
                            <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                                    <input type="text" class="form-control" name="brand_name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                                    <input type="file" class="form-control" name="brand_image" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit">Add Brand</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    @endsection
