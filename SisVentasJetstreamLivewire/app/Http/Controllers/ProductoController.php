<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('id', 'asc')->paginate(5);
        return view('productos.index', compact('productos'));
    }


    public function create()
    {
        return view('productos.create');
    }


    public function store(StoreProductoRequest $request)
    {
        $producto = new Producto();
        $producto = Producto::create($request->all());
        return redirect()->route('productos.show', $producto);
    }


    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }


    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }


    public function update(Request $request, Producto $producto)
    {
        $producto->update($request->all());
        return redirect()->route('productos.show', $producto);
    }


    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }
}
