<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContenedor;
use App\Models\Contenedor;
use Illuminate\Http\Request;

class ContenedorController extends Controller
{
    public function index()
    {
        $contenedores = Contenedor::orderBy('id', 'asc')->paginate(5);
        return view('contenedores.index', compact('contenedores'));
    }

    public function create()
    {
        return view('contenedores.create');
    }

    public function store(StoreContenedor $request)
    {

        $categoria = new Contenedor();
        $categoria = Contenedor::create($request->all());
        return redirect()->route('contenedores.show', $categoria);
    }

    public function show(Contenedor $categoria)
    {
        return view('contenedores.show', compact('categoria'));
    }

    public function edit(Contenedor $categoria)
    {
        return view('contenedores.edit', compact('categoria'));
    }

    public function update(Request $request, Contenedor $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('contenedores.show', $categoria);
    }

    public function destroy(Contenedor $categoria)
    {
        $categoria->delete();
        return redirect()->route('contenedores.index');
    }
}
