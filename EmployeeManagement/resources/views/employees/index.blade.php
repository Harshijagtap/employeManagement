@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12 grid-margin">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card">
            
                <div class="card-header">
                    <h4>Employees</h4>
                    <a href="{{ url('admin/employees/create') }}" class="btn btn-primary text-white text-bold float-end">Add Employee</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial No.</th>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;?>
                            @forelse ($employees as $employee)
                            <tr>
                                <td>{{ $i}}</td>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->last_name }}</td>
                                <td>
                                    @if ($employee->company)
                                        {{ $employee->company->name }}
                                    @else
                                        No Company Added
                                    @endif
                                </td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                

                                <td>
                                    <a href="{{ url('admin/employees/'.$employee->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                    <form action="{{ url('admin/employees/'.$employee->id) }}" method="POST" onsubmit="return confirm('Are you sure, you want to delete employee?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" style="margin-top:5px;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @empty
                            <tr>
                                <td colspan="8" style="text-align: center;">No Employees Available</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection