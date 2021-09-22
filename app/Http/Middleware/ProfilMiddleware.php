<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\VouterController;
class ProfilMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    // si le vouter est connecter on recupere les surveys sur lesquels il a voté et on rederige vers son profil
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('vouter')){
           return redirect('login');
        }
        $vouter= session('vouter');
        $vouter->surveys();
        return $next($request);
    }
}
