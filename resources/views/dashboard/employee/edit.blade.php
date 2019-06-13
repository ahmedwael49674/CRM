@extends('dashboard.layout.app')
@section('title')
{{__('employee.Update New Employee')}}
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">{{__('employee.Update New Employee')}}</h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{ url('dashboard/employee') }}">{{ __('common.Dashboard')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('employee.Update New Employee')}}</li>
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
                    <form class="form" method="post" action="{{ url('dashboard/employee/'.$employee->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <input type="hidden" name="id" value="{{ $employee->id }}">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">{{__('employee.First Name')}}</label>
                            <div class="col-10">
                                <input name="first_name" class="form-control" type="text"
                                    value="{{ old('first_name', $employee->first_name) }}">
                                @isset($errors->first_name)
                                <div class="alert alert-danger">
                                    {{ $errors->first('first_name') }}
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">{{__('employee.Last Name')}}</label>
                            <div class="col-10">
                                <input name="last_name" class="form-control" type="text"
                                    value="{{ old('last_name', $employee->last_name) }}">
                                @isset($errors->last_name)
                                <div class="alert alert-danger">
                                    {{ $errors->first('last_name') }}
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">{{__('employee.E-mail')}}</label>
                            <div class="col-10">
                                <input name="email" class="form-control" type="email" 
                                    value="{{ old('email', $employee->email) }}">
                                @isset($errors->email)
                                <div class="alert alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                                @endisset
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="example-text-input" class="col-2 col-form-label">{{__('employee.Phone')}}</label>
                            <div class="col-10">
                                <input name="phone" class="form-control" type="text"
                                    value="{{ old('phone', $employee->phone) }}">
                                @isset($errors->phone)
                                <div class="alert alert-danger">
                                    {{ $errors->first('phone') }}
                                </div>
                                @endisset
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-month-input2" class="col-2 col-form-label">{{__('employee.Company')}}</label>
                            <div class="col-10">
                                <select class="custom-select company-select col-12" id="example-month-input2"
                                    name="company_id">
                                    <option selected="">{{__('employee.Choose Company Name')}}</option>
                                    @foreach ($companies as $key => $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-actions float-right">
                            <a href="{{ url('dashboard/employee') }}" type="button" class="btn btn-dark">{{__('common.Cancel')}}</a>
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> {{__('common.Save')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('.company-select option[value="{{ $employee->company_id }}"]').prop('selected', true);
    @if(old('company_id'))
    $('.company-select option[value="{{ old('company_id ') }}"]').prop('selected', true);
    @endif
</script>
@endsection