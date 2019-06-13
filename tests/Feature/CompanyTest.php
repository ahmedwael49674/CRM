<?php

namespace Tests\Feature;

use App\Company;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class CompanyTest extends TestCase
{
    use DatabaseMigrations, WithoutMiddleware;

    /** @test */
    public function AdminCanRetriveAllTheCompanies()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 

        //Given we have company in the database
        $company = factory(\App\Company::class)->create();
        //When user visit the companies page
        $response = $this->get('/dashboard/company');
        
        //He should be able to read the company
        $response->assertSee($company->name)
                ->assertSee($company->email);
    }
    
    /** @test */
    public function AdminCanReadSingleCompany()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 

        //Given we have company in the database
        $company = factory(\App\Company::class)->create();
        
        //When user visit the companies page
        $response = $this->call('GET','/dashboard/company/'.$company->id);

        //He should be able to read the company
        $response->assertSee($company->name);
    }
    
    /** @test */
    public function AdminCanCreateNewCompany()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create());

        //Given we have company in the database
        $company = factory(\App\Company::class)->make();
        
        //It gets stored in the database//When user visit the companies page
        $response   =   $this->post('/dashboard/company',$company->toArray());

        //It gets stored in the database
        $this->assertEquals(1,Company::all()->count());
    }

    /** @test */
    public function AdminCanEditSingleCompany()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 

        //Given we have company in the database
        $company = factory(\App\Company::class)->create();

        //When user visit the companies page
        $response = $this->get('/dashboard/company/'.$company->id.'/edit');
        file_put_contents('test.html',$response->getContent());
        //He should be able to read the company
        $response->assertSee($company->email);
    }

    /** @test */
    public function AdminCanUpdateSingleCompany()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create()); 

        //Given we have company in the database
        $company            =   factory(\App\Company::class)->create();
        $company->name      =   'Updated';

        //When the user hit's the endpoint to update the company
        $this->put('/dashboard/company/'.$company->id, $company->toArray());

        //He should be able to read the company
        $this->assertDatabaseHas('companies',['id'=> $company->id , 'name' => 'Updated']);
    }

    /** @test */
    public function AdminCanDeleteSingleCompany(){

        //Given we have a signed in user
        $this->actingAs(factory('App\User')->create());

        //And a company which is created by the user
        $company = factory('App\Company')->create();

        //When the user hit's the endpoint to delete the company
        $this->delete('/dashboard/company/'.$company->id);

        //The company should be deleted from the database.
        $this->assertDatabaseMissing('companies',['id'=> $company->id]);

    }
}
