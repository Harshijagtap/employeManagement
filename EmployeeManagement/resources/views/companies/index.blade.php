@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
            
                <div class="card-header">
                    <h4>Companies</h4>
                    <a href="{{ url('admin/companies/create') }}" class="btn btn-primary text-white text-bold float-end">Add Company</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Logo</th>
                                <th>Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;?>
                            @forelse ($companies as $company)
                            <tr>
                                <td>{{ $i}}</td>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    <img src="{{ asset('storage/companies/'.$company->logo) }}" style="width: 60px; height: 60px;" alt="...">
                                </td>
                                <td>{{ $company->website }}</td>
                                <td>
                                    <a href="{{ url('admin/companies/'.$company->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ url('admin/companies/'.$company->id) }}" method="POST" onsubmit="return confirm('Are you sure, you want to delete company?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" style="margin-top:5px;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @empty
                            <tr>
                                <td colspan="8" style="text-align: center;">No Companies Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                        {{-- <div>
                            {{ $companies->links() }}
                        </div> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection