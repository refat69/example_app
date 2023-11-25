@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <h1>Home About</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All About
                            <a href="{{ route('add.about') }}" class="btn btn-info float-right">Add About</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL NO</th>
                                    <th scope="col" width="15%">About Title</th>
                                    <th scope="col" width="15%">Short Description</th>
                                    <th scope="col" width="15%">Long Description</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($homeabout as $about)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->short_dis }}</td>
                                        <td>{{ $about->long_dis }}</td>
                                        <td>
                                            <a href="{{ url('about/edit/' . $about->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('about/delete/' . $about->id) }}"
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
            </div>
        </div>
    @endsection
