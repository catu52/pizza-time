<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

use App\Models\Pizza;
use App\Http\Requests\PizzaRequest;
use App\Models\Ingredient;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Jetstream::inertia()->render($request, 'Admin/Pizza', [
            'pizzas' => Pizza::with('ingredients')->get(),
            'ingredients' => Ingredient::all()->map(function($ingredient){
                return [
                    'id' => $ingredient->id,
                    'name' => $ingredient->name
                ];
            })
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PizzaRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PizzaRequest $request)
    {
        $validated = $request->validated();

       if($pizza = Pizza::create($validated))
       {
            $pizza->ingredients()->sync(array_map(function($values){
                return $values['id'];
            }, $request->ingredients));

            return redirect()->back()->with('message', 'Pizza Created Successfully.');
       }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PizzaRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PizzaRequest $request, $id)
    {
        $validated = $request->validated();

        $pizza = Pizza::find($id);

        if($pizza->update($validated))
        {
            $pizza->ingredients()->sync(array_map(function($values){
                return $values['id'];
            }, $request->ingredients));

            return redirect()->back()->with('message', 'Pizza Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pizza::find($id)->delete();

        return redirect()->back();
    }
}
