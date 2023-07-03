<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovimientoRequest;
use App\Models\Movimiento;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::orderBy('id', 'asc')->paginate(5);
        return view('movimiento.index', compact('movimientos'));
    }


    public function create()
    {
        return view('movimientos.create');
    }


    public function store(StoreMovimientoRequest $request)
    {
        $movimiento = new Movimiento();
        $movimiento = Movimiento::create($request->all());
        return redirect()->route('movimientos.show', $movimiento);
    }


    public function show(Movimiento $movimiento)
    {
        return view('movimientos.show', compact('movimiento'));
    }


    public function edit(Movimiento $movimiento)
    {
        return view('movimientos.edit', compact('movimiento'));
    }


    public function update(Request $request, Movimiento $movimiento)
    {
        $movimiento->update($request->all());
        return redirect()->route('movimientos.show', $movimiento);
    }


    public function destroy(Movimiento $movimiento)
    {
        $movimiento->delete();
        return redirect()->route('movimientos.index');
    }
}
