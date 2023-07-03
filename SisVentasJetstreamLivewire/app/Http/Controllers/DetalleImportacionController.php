<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetalleImportacionRequest;
use App\Models\DetalleImportacion;
use Illuminate\Http\Request;

class DetalleImportacionController extends Controller
{
    public function index()
    {
        $detalleimportaciones = DetalleImportacion::orderBy('id', 'asc')->paginate(5);
        return view('detalle_importacion.index', compact('detalleimportaciones'));
    }


    public function create()
    {
        return view('detalleimportacion.create');
    }


    public function store(StoreDetalleImportacionRequest $request)
    {
        $detalleimportacion = new DetalleImportacion();
        $detalleimportacion = DetalleImportacion::create($request->all());
        return redirect()->route('detalleimportacion.show', $detalleimportacion);
    }


    public function show(DetalleImportacion $detalleimportacion)
    {
        return view('detalleimportacion.show', compact('detalleimportacion'));
    }


    public function edit(DetalleImportacion $detalleimportacion)
    {
        return view('detalleimportacion.edit', compact('detalleimportacion'));
    }


    public function update(Request $request, DetalleImportacion $detalleimportacion)
    {
        $detalleimportacion->update($request->all());
        return redirect()->route('detalleimportacion.show', $detalleimportacion);
    }


    public function destroy(DetalleImportacion $detalleimportacion)
    {
        $detalleimportacion->delete();
        return redirect()->route('detalleimportacion.index');
    }
}
