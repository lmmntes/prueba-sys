<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('vehiculos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'año' => 'required|date|max:255',
            'placa' => 'required|string|unique:vehicles',
            'color' => 'required|string|max:255',
            'fecha_i' => 'required|date|max:255',
            'modelo' => 'required|string|max:255',
            'marca' => 'required|string|max:255',
        ]);


        try {
        $new = new Vehicle;
        $new->placa =$request->placa;
        $new->año =$request->año;
        $new->color =$request->color;
        $new->fecha_ingreso =$request->fecha_i;
        $new->modelo =$request->modelo;
        $new->marca =$request->marca;
        $new->save();
        } catch(QueryException $e) {
            return response()->json(['error' => 'Database error'], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        //
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        //
        $vehiculo->placa =$request->placa;
        $vehiculo->año =$request->año;
        $vehiculo->color =$request->color;
        $vehiculo->fecha_ingreso =$request->fecha_i;
        $vehiculo->modelo =$request->modelo;
        $vehiculo->marca =$request->marca;
        $vehiculo->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        //
    }
}
