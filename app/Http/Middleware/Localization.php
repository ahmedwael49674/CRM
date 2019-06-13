<?php
namespace App\Http\Middleware;

use Closure;
use App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale') && session()->has('direction')) {
            App::setLocale(session()->get('locale'));
            config(['app.direction' => session()->get('direction')]);
        }
        return $next($request);
    }
}