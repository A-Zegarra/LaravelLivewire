<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::orderBy('id', 'asc')->paginate(5);
        return view('proveedores.index', compact('proveedores'));
    }


    public function create()
    {
        return view('proveedores.create');
    }


    public function store(StoreCategoriaRequest $request)
    {
        $proveedor = new Proveedor();
        $proveedor = Proveedor::create($request->all());
        return redirect()->route('proveedores.show', $proveedor);
    }


    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }


    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }


    public function update(Request $request, Proveedor $proveedor)
    {
        $proveedor->update($request->all());
        return redirect()->route('proveedores.show', $proveedor);
    }


    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}
