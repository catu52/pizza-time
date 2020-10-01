<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Jetstream\Jetstream;

use App\Models\Ingredient;
use App\Http\Requests\IngredientRequest;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Jetstream::inertia()->render($request, 'Admin/Ingredient', [
            'ingredients' => Ingredient::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\IngredientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(IngredientRequest $request)
    {
        $validated = $request->validated();

        if($ingredient = Ingredient::create($validated))
        {
            return redirect()->back()->with('message', 'Ingredient Created Successfully.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\IngredientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IngredientRequest $request, $id)
    {
        $validated = $request->validated();

        $ingredient = Ingredient::find($id);

        if($ingredient->update($validated))
        {
            return redirect()->back()->with('message', 'Ingredient Updated Successfully.');
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
        Ingredient::find($id)->delete();

        return redirect()->back();
    }
}
