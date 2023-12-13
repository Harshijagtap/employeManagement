@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h4>Update Employee</h4>
                 <a href="{{ url('admin/employees') }}" class="btn btn-primary text-white text-bold float-end">Back</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/employees/'.$employee->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label style="margin-bottom: 10px;">First Name</label>
                        <input class="form-control" type="text" value="{{ $employee->first_name }}" name="first_name" >
                    </div>

                    <div class="mb-3">
                        <label style="margin-bottom: 10px;">Last Name</label>
                        <input class="form-control" type="text" value="{{ $employee->last_name }}" name="last_name">
                    </div>

                    <div class="mb-3">
                        <label style="margin-bottom: 10px;" >Company Name</label>
                        <select name="company_id" class="form-control">
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" {{ $company->id == $employee->company_id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label style="margin-bottom: 10px;">Email</label>
                        <input class="form-control" type="email" rows="3" value="{{ $employee->email }}" name="email">
                    </div>
                   
                    <div class="mb-3">
                        <label style="margin-bottom: 10px;">Phone</label>
                        <input class="form-control" type="phone" value="{{ $employee->phone }}" name="phone">
                    </div>
                    <div>
                        <button class="btn btn-primary text-white" type="submit">Update Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection