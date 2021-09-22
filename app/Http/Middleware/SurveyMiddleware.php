<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SurveyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // si on a pas des survey dans la session on revient vers le profil
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('survey')){
            return redirect('profile');
        }
        return $next($request);
    }
}
