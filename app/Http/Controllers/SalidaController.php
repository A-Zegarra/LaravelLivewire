<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSalida;
use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::orderBy('id', 'asc')->paginate(5);
        return view('salidas.index', compact('salidas'));
    }

    public function create()
    {
        return view('salidas.create');
    }

    public function store(StoreSalida $request)
    {

        $salida = new Salida();
        $salida = Salida::create($request->all());
        return redirect()->route('salidas.show', $salida);
    }

    public function show(Salida $salida)
    {
        return view('salidas.show', compact('salida'));
    }

    public function edit(Salida $salida)
    {
        return view('salidas.edit', compact('salida'));
    }

    public function update(Request $request, Salida $salida)
    {
        $salida->update($request->all());
        return redirect()->route('salidas.show', $salida);
    }

    public function destroy(Salida $salida)
    {
        $salida->delete();
        return redirect()->route('salidas.index');
    }
}
