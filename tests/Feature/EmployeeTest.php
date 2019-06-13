<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\{Employee, Company};
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class EmployeeTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    /** @test */
    public function AdminCanRetriveAllTheEmployees()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 
        
        //create company
        $company = factory(\App\Company::class)->create();
        
        //Given we have employee in the database
        $employee = factory(\App\Employee::class)->create(['company_id' => $company->id]);

        //When user visit the companies page
        $response = $this->get('/dashboard/employee');
        
        //He should be able to read the employee
        $response->assertSee($employee->first_name)
                ->assertSee($employee->last_name);
    }
    
    /** @test */
    public function AdminCanCreateSingleEmployee()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 

        //Given we have company in the database
        $company = factory(\App\Company::class)->create();
        
        //When user visit the companies page
        $this->call('GET','/dashboard/company/create');

        //He should be able to read the company
        $this->assertEquals(1,Company::all()->count());
    }
    
    /** @test */
    public function AdminCanCreateNewEmployee()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create());

        //create company
        $company = factory(\App\Company::class)->create();
        
        //Given we have employee in the database
        $employee = factory(\App\Employee::class)->create(['company_id' => $company->id]);

        //When user visit the employees page
        $response   =   $this->post('/dashboard/employee',$employee->toArray());

        //It gets stored in the database
        $this->assertEquals(1,Employee::all()->count());
    }

    /** @test */
    public function AdminCanEditSingleEmployee()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 

        //create company
        $company = factory(\App\Company::class)->create();
        
        //Given we have employee in the database
        $employee = factory(\App\Employee::class)->create(['company_id' => $company->id]);
        
        //When user visit the companies page
        $response = $this->call('GET','/dashboard/employee/'.$employee->id.'/edit');

        //He should be able to read the company
        $response->assertSee($company->first_name);
    }

    /** @test */
    public function AdminCanUpdateSingleEmployee()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 
        //create company
        $company = factory(\App\Company::class)->create();
        
        //Given we have employee in the database
        $employee                 =     factory(\App\Employee::class)->create(['company_id' => $company->id]);
        $employee->first_name     =     'Updated';

        //When the user hit's the endpoint to update the employee
        $this->put('/dashboard/employee/'.$employee->id, $employee->toArray());

        //He should be able to read the employee
        $this->assertDatabaseHas('employees',['id'=> $employee->id , 'First_name' => 'Updated']);
    }

    /** @test */
    public function AdminCanDeleteSingleEmployee(){

        //Given we have a signed in user
        $this->actingAs(factory('App\User')->create());
        //create company
        $company = factory(\App\Company::class)->create();
        
        //Given we have employee in the database
        $employee                 =     factory(\App\Employee::class)->create(['company_id' => $company->id]);

        //When the user hit's the endpoint to delete the employee
        $this->delete('/dashboard/employee/'.$employee->id);

        //The employee should be deleted from the database.
        $this->assertDatabaseMissing('employees',['id'=> $employee->id]);

    }
}
