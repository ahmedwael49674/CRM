@extends('dashboard.layout.app')
@section('title')
{{__('employee.Index Employees')}}
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
        <h4 class="page-title">
            @isset($company)
            <img src="{{ asset('storage/'.$company->logo)}}" width="70"
            class="rounded-circle"> {{$company->name}}
            @endisset
             {{__('employee.Employees')}}</h4>
            <div class="d-flex align-items-center">
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="{{ url('dashboard/employee') }}">{{ __('common.Dashboard')}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{__('employee.Employees')}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <!-- File export -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file_export" class="table table-striped table-bordered display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{__('employee.First Name')}}</th>
                                    <th>{{__('employee.Last Name')}}</th>
                                    <th>{{__('employee.Company Name')}}</th>
                                    <th>{{__('common.Actions')}}</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($employees as $key => $employee)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->company->name }}</td>
                                    <td>
                                        <a href="{{ url('dashboard/employee/'.$employee->id.'/edit') }}"
                                            class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip"
                                            data-original-title="Update"><i class="ti-pencil-alt"
                                                aria-hidden="true"></i></a>
                                        <a href="#"
                                            class="warning-alert btn btn-sm btn-icon btn-pure btn-outline delete-row-btn"
                                            data-toggle="tooltip" data-original-title="Delete"
                                            data-url="{{ url('dashboard/employee/'.$employee->id) }}"
                                            data-method="DELETE" data-msg="Are you sure ?"
                                            data-csrf="{{csrf_token()}}"><i class="ti-close" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection