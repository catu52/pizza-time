<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

use App\Models\Pizza;
use App\Http\Resources\PizzaResource;

class PizzaController extends Controller
{
    public function index(Request $request)
    {
        return response(new PizzaResource(Pizza::all()));
    }
}
