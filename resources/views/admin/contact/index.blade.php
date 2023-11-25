@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <h1>Contact Page</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card-header">All Contact Data
                            <a href="{{ route('add.contact') }}" class="btn btn-info float-right">Add contact</a>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">SL NO</th>
                                    <th scope="col" width="15%">Contact Address</th>
                                    <th scope="col" width="15%">Contact Email</th>
                                    <th scope="col" width="15%">Contact Phone</th>
                                    <th scope="col" width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $contact->address }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>
                                            <a href="{{ url('admin/contact/edit/' . $contact->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('admin/contact/delete/' . $contact->id) }}"
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
