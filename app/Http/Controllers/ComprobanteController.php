<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comprobante;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComprobante;

class ComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comprobantes = Comprobante::orderBy('id', 'asc')->paginate(5);
        return view('comprobantes.index', compact('comprobantes'));
    }

    public function create()
    {
        return view('comprobantes.create');
    }

    public function store(StoreComprobante $request)
    {

        $comprobante = new Comprobante();
        $comprobante = Comprobante::create($request->all());
        return redirect()->route('comprobantes.show', $comprobante);
    }

    public function show(Comprobante $comprobante)
    {
        return view('comprobantes.show', compact('comprobante'));
    }

    public function edit(Comprobante $comprobante)
    {
        return view('comprobantes.edit', compact('comprobante'));
    }

    public function update(Request $request, Comprobante $comprobante)
    {
        $comprobante->update($request->all());
        return redirect()->route('comprobantes.show', $comprobante);
    }

    public function destroy(Comprobante $comprobante)
    {
        $comprobante->delete();
        return redirect()->route('comprobantes.index');
    }
}
