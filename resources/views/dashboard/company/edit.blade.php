@extends('dashboard.layout.app')
@section('title')
Update Company
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Update Company Data</h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard/company/') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Update Company Data</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"></h4>
                    <h5 class="card-subtitle"></h5>
                    <form class="form" method="post" action="{{ url('dashboard/company/'.$company->id) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }} {{ method_field('PUT') }}

                        <input type="hidden" name="id" value="{{ $company->id }}">

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                            <div class="col-10">
                                <input name="name" class="form-control" type="text"
                                    value="{{ old('name', $company->name) }}">
                                @isset($errors->name)
                                <div class="alert alert-danger">
                                    {{ $errors->first('name') }}
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">E-mail</label>
                            <div class="col-10">
                                <input name="email" class="form-control" type="email"
                                    value="{{ old('email', $company->email) }}">
                                @isset($errors->email)
                                <div class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Website</label>
                            <div class="col-10">
                                <input name="website" class="form-control" type="url"
                                    value="{{ old('website', $company->website) }}">
                                @isset($errors->website)
                                <div class="alert alert-danger">
                                    {{ $errors->first('website') }}
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">Logo</label>
                            <div class="col-10">
                                <input name="logo" class="form-control" type="file" value="{{ old('logo') }}">
                                @isset($errors->logo)
                                <div class="alert alert-danger">
                                    {{ $errors->first('logo') }}
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="form-actions float-right">
                            <a href="{{ url('dashboard/company') }}" type="button" class="btn btn-dark">Cancel</a>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection