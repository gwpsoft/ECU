<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Session\Session;

class frontAuth
{
    
	
	
	
	
	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,Session $session)
    {
		
        $session->start();
		
		 if(!($session->has('front_email'))) {
            
            return redirect(url().'/login');
        }
		else 
		{
			return redirect(url().'/dashboard');
			
			}
		//check if logged in
			//if logged in than check group
			
		//else redirect to login
		
        return $next($request);
    }
}
