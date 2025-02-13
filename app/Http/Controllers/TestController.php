<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domains\Cart\Actions\InitializeCart;
use App\Domains\Cart\Data\CartIdentifiersData;
use App\Domains\Product\Projections\Product;

final class TestController extends Controller
{
    public function test()
    {
        // dd(Product::first()->variants);

        $cart = (new InitializeCart)(CartIdentifiersData::from([
            'customerUuid' => null,
            'sessionId' => session()->getId(),
        ]));

        dd($cart);
    }
}
