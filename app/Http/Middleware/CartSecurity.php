<?php

namespace App\Http\Middleware;

use Closure;
use Cart;
use Session;
class CartSecurity
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
        $session=Session::get('total_price');

        if (Session::get('total_price')){
            return $next($request);
        } elseif($session==null){
            return redirect('/');
        }

    }
}
