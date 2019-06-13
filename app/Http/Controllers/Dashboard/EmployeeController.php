<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\{Employee,Company};

class EmployeeController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $employees = Employee::with('company:id,name')->paginate(10);
    return view('dashboard.employee.index', compact('employees'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $companies= Company::all();
    return view('dashboard.employee.create', compact('companies'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(EmployeeRequest $request)
  {
    Employee::create($request->all());
    return redirect('dashboard/employee')->with('msg', 'Employee added successfully.');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Int $id)
  {
    $employee     = Employee::findOrFail($id);
    $companies    = Company::all();
    return view('dashboard.employee.edit',compact('employee','companies'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(EmployeeRequest $request, Int $id)
  {

    Employee::findOrFail($id)->update($request->all());
    return redirect()->back()->with('msg', 'Employee updated successfully.');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Int $id)
  {
    Employee::findOrFail($id)->delete();
    return ['status'=>1, 'msg'=>'Employee deleted successfully.'];

  }
}
