<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Events\NewUserCreated;
use App\Repositories\Companies;
use Illuminate\Http\Request;
use App\{Company,Employee};
use Auth;

class CompanyController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $companies = Company::paginate(10);
    
    return view('dashboard.company.index',compact('companies'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('dashboard.company.create');
  }

  /**
  * filter a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $company    = Company::findOrFail($id);
    $employees  = Employee::whereCompanyId($id)->paginate(10);
    
    return view('dashboard.employee.index', compact('employees','company'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(CompanyRequest $request)
  {
    $company  = Company::create($request->all());
    event(new NewUserCreated($company));
    return back()->with('msg', 'Company added successfully.');
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit(Int $id)
  {
    $company = Company::findOrFail($id);
    return view('dashboard.company.edit', compact('company'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(CompanyRequest $request, Int $id)
  {
    $company  = Company::findOrFail($id);
    $request->has('image')?Companies::RemoveLogoIfExist($company):'';
    $company->update($request->all());

    return redirect()->back()->with('msg', 'Company updated successfully.');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy(Int $id)
  {
    $company =  Company::findOrFail($id);
    Companies::RemoveLogoIfExist($company);
    $company->employees()->delete();
    $company->delete();

    return ['status'=>1];
  }
}
