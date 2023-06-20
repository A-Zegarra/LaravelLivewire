<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id', 'asc')->paginate(5);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('cliente.create');
    }

    public function store(StoreCliente $request)
    {
        $cliente = new Cliente();
        $cliente = Cliente::create($request->all());
        return redirect()->route('clientes.show', $cliente);
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliene'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit',compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.show', $cliente);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
