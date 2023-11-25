@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <h1>Home Service</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">All Service
                            <a href="{{ route('add.service') }}" class="btn btn-info float-right">Add Service</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL NO</th>
                                    <th scope="col" width="15%">Service Title</th>
                                    <th scope="col" width="15%">Short Description</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($services as $service)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->short_des }}</td>
                                        <td>
                                            <a href="{{ url('service/edit/' . $service->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('service/delete/' . $service->id) }}"
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
