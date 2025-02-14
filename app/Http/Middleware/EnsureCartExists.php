<?php

namespace App\Http\Middleware;

use App\Domains\Cart\Actions\InitializeCart;
use App\Domains\Cart\Data\CartIdentifiersData;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCartExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');

            return $next($request);
        }

        $customerUuid = null;
        $sessionId = session()->getId();

        $cart = (new InitializeCart)(CartIdentifiersData::from([
            'customerUuid' => $customerUuid,
            'sessionId' => $sessionId,
        ]));
        session()->put('cart', $cart);

        return $next($request);
    }
}
