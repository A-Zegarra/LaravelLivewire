<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetalleVentaRequest;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $detalleventas = DetalleVenta::orderBy('id', 'asc')->paginate(5);
        return view('detalle_venta.index', compact('detalleventas'));
    }


    public function create()
    {
        return view('detalle_venta.create');
    }


    public function store(StoreDetalleVentaRequest $request)
    {
        $detalleventa = new DetalleVenta();
        $detalleventa = DetalleVenta::create($request->all());
        return redirect()->route('detalleventas.show', $detalleventa);
    }


    public function show(DetalleVenta $detalleventa)
    {
        return view('detalleventas.show', compact('detalleventa'));
    }


    public function edit(DetalleVenta $detalleventa)
    {
        return view('detalleventas.edit', compact('detalleventa'));
    }


    public function update(Request $request, DetalleVenta $detalleventa)
    {
        $detalleventa->update($request->all());
        return redirect()->route('detalleventas.show', $detalleventa);
    }


    public function destroy(DetalleVenta $detalleventa)
    {
        $detalleventa->delete();
        return redirect()->route('detalleventas.index');
    }
}
