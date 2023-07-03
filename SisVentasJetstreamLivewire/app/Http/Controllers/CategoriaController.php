<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categorias = Categoria::orderBy('id', 'asc')->paginate(5);
        return view('categorias.index', compact('categorias'));
    }


    public function create()
    {
        return view('categorias.create');
    }


    public function store(StoreCategoriaRequest $request)
    {
        $categoria = new Categoria();
        $categoria = Categoria::create($request->all());
        return redirect()->route('categorias.show', $categoria);
    }


    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }


    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }


    public function update(Request $request, Categoria $categoria)
    {
        $categoria->update($request->all());
        return redirect()->route('categorias.show', $categoria);
    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
