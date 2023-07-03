<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Models\Importacion;
use Illuminate\Http\Request;

class ImportacionController extends Controller
{
    public function index()
    {
        $importacions = Importacion::orderBy('id', 'asc')->paginate(5);
        return view('importacion.index', compact('importacions'));
    }


    public function create()
    {
        return view('importacions.create');
    }


    public function store(StoreCategoriaRequest $request)
    {
        $importacion = new Importacion();
        $importacion = Importacion::create($request->all());
        return redirect()->route('importacions.show', $importacion);
    }


    public function show(Importacion $importacion)
    {
        return view('importacions.show', compact('importacion'));
    }


    public function edit(Importacion $importacion)
    {
        return view('importacions.edit', compact('importacion'));
    }


    public function update(Request $request, Importacion $importacion)
    {
        $importacion->update($request->all());
        return redirect()->route('importacions.show', $importacion);
    }


    public function destroy(Importacion $importacion)
    {
        $importacion->delete();
        return redirect()->route('importacions.index');
    }
}
