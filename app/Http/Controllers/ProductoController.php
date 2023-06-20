<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
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
        $categorias = Categoria::all();

        return view('productos.create', compact('categorias'));
    }

    public function store(request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'codigo' => 'required',
            'costo' => 'required'
        ]);

        $producto = new Producto();
        $producto->descripcion = $request->descripcion;
        $producto->codigo = $request->codigo;
        $producto->caja = $request->caja;
        $producto->costo = $request->costo;
        $producto->precioMenor = $request->menor;
        $producto->precioMayor = $request->mayor;
        $producto->origen = $request->origen;
        $producto->id_categoria = $request->categoria;


        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'img/';
            $filename = $producto->codigo . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $producto->imagen = $destinationPath . $filename;
        } else {
            $producto->imagen = 'img/sin_foto.png';
        }

        $producto->save();
        return redirect()->route('productos.index');
    }

    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto'), compact('categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $producto->descripcion = $request->descripcion;
        $producto->codigo = $request->codigo;
        $producto->caja = $request->caja;
        $producto->costo = $request->costo;
        $producto->precioMenor = $request->menor;
        $producto->precioMayor = $request->mayor;
        $producto->origen = $request->origen;
        $producto->id_categoria = $request->categoria;

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $destinationPath = 'img/';
            $filename = $producto->codigo . '.' . $file->getClientOriginalExtension();
            $uploadSuccess = $request->file('imagen')->move($destinationPath, $filename);
            $producto->imagen = $destinationPath . $filename;
        }

        $producto->save();
        return redirect()->route('productos.index');
    }
}
