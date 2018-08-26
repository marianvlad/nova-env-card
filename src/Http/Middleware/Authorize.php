<?php

namespace Marianvlad\NovaEnvCard\Http\Middleware;

use Closure;
use Laravel\Nova\Nova;
use Illuminate\Http\Request;
use Marianvlad\NovaEnvCard\NovaEnvCard;
use Symfony\Component\HttpFoundation\Response;

class Authorize
{
    public function handle(Request $request, Closure $next)
    {
        return $this->isAuthorized(NovaEnvCard::class, $request) ? $next($request) : abort(403);
    }

   /**
    * Check if the card is authorized.
    * 
    * @param  string  $class   
    * @param  \Illuminate\Http\Request $request 
    * @return boolean
    */
    protected function isAuthorized($class, Request $request)
    {
    	return collect(
    		array_merge(
    			Nova::availableCards($request), Nova::availableTools($request)
    		))->first(function ($value, $key) use ($class) {
    			return $class == get_class($value);
    		}) ? true : false;
    }
}