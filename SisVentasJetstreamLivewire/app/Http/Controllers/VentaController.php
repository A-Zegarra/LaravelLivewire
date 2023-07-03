<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVentaRequest;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::orderBy('id', 'asc')->paginate(5);
        return view('ventas.index', compact('ventas'));
    }


    public function create()
    {
        return view('ventas.create');
    }


    public function store(StoreVentaRequest $request)
    {
        $venta = new Venta();
        $venta = Venta::create($request->all());
        return redirect()->route('ventas.show', $venta);
    }


    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }


    public function edit(Venta $venta)
    {
        return view('ventas.edit', compact('venta'));
    }


    public function update(Request $request, Venta $venta)
    {
        $venta->update($request->all());
        return redirect()->route('ventas.show', $venta);
    }


    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index');
    }
}
