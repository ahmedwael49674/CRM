<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * set lang and direction
     *
     * @return back
    */
    public function lang(String $locale, String $dir)
    {
        session()->put('locale', $locale);
        session()->put('direction', $dir);
        return redirect()->back();
    }
}
