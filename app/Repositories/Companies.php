<?php

namespace App\Repositories;

use App\Company;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CompanyRequest;

class Companies
{
    /**
     * check company logo if exist remove it
     *
     * @param  Company $company
    */
    public static function RemoveLogoIfExist(Company $company)
    {
        if (Storage::disk('public')->exists($company->logo)) {
            Storage::disk('public')->delete($company->logo);
        }
    }  

}