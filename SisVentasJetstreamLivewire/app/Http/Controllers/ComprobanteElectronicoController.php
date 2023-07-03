<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComprobanteElectronicoRequest;
use App\Models\ComprobanteElectronico;
use Illuminate\Http\Request;

class ComprobanteElectronicoController extends Controller
{
    public function index()
    {
        $comprobanteelectronicos = ComprobanteElectronico::orderBy('id', 'asc')->paginate(5);
        return view('comprobante_electronico.index', compact('comprobanteelectronicos'));
    }


    public function create()
    {
        return view('comprobanteelectronico.create');
    }


    public function store(StoreComprobanteElectronicoRequest $request)
    {
        $comprobanteelectronico = new ComprobanteElectronico();
        $comprobanteelectronico = ComprobanteElectronico::create($request->all());
        return redirect()->route('comprobanteelectronico.show', $comprobanteelectronico);
    }


    public function show(ComprobanteElectronico $comprobanteelectronico)
    {
        return view('comprobanteelectronico.show', compact('comprobanteelectronico'));
    }


    public function edit(ComprobanteElectronico $comprobanteelectronico)
    {
        return view('comprobanteelectronico.edit', compact('comprobanteelectronico'));
    }


    public function update(Request $request, ComprobanteElectronico $comprobanteelectronico)
    {
        $comprobanteelectronico->update($request->all());
        return redirect()->route('comprobanteelectronico.show', $comprobanteelectronico);
    }


    public function destroy(ComprobanteElectronico $comprobanteelectronico)
    {
        $comprobanteelectronico->delete();
        return redirect()->route('comprobanteelectronico.index');
    }
}
