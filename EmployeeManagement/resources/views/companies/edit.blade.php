@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h4>Add Company</h4>
                 <a href="{{ url('admin/companies') }}" class="btn btn-primary text-white text-bold float-end">Back</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="{{ url('admin/companies/'.$company->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label style="margin-bottom: 10px;">Name</label>
                        <input class="form-control" type="text" value="{{ $company->name }}" name="name">
                    </div>
                    
                    <div class="mb-3">
                        <label style="margin-bottom: 10px;">Email</label>
                        <input class="form-control" type="text" value="{{ $company->email }}"  name="email">
                    </div>
                    <div class="mb-3">
                        <label style="margin-bottom: 10px;">Logo</label>
                        <input class="form-control" type="file" name="logo">
                        @if ($company->logo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/companies/'.$company->logo) }}" alt="Company Logo" style="max-width: 100px;">
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label style="margin-bottom: 10px;">Website</label>
                        <input class="form-control" type="website"value="{{ $company->website }}"  name="website">
                    </div>
                    <div>
                        <button class="btn btn-primary text-white" type="submit">Update Company</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection