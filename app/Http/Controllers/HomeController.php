<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return Jetstream::inertia()->render($request, 'Home');
    }
}
