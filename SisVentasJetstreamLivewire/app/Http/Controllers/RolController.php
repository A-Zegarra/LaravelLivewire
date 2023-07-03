<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRolRequest;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $rols = Rol::orderBy('id', 'asc')->paginate(5);
        return view('rols.index', compact('rols'));
    }


    public function create()
    {
        return view('rols.create');
    }


    public function store(StoreRolRequest $request)
    {
        $rol = new Rol();
        $rol = Rol::create($request->all());
        return redirect()->route('rols.show', $rol);
    }


    public function show(Rol $rol)
    {
        return view('rols.show', compact('rol'));
    }


    public function edit(Rol $rol)
    {
        return view('rols.edit', compact('rol'));
    }


    public function update(Request $request, Rol $rol)
    {
        $rol->update($request->all());
        return redirect()->route('rols.show', $rol);
    }


    public function destroy(Rol $rol)
    {
        $rol->delete();
        return redirect()->route('rols.index');
    }
}
