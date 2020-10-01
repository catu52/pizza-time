<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Purchase;
use App\Http\Requests\PurchaseRequest;

class PurchaseController extends Controller
{
    public function purchase(PurchaseRequest $request)
    {
        $validated = $request->validated();

        if($purchase = Purchase::create($validated))
        {
            foreach ($request->pizzas as $value)
            {
                $purchase->items()->attach($value['id'], ['quantity' => $value['quantity'], 'subtotal' => $value['price']]);
            }

            return response('Items purchased!', 200);
        }

        return response('Internal Server Error', 500);

    }
}
