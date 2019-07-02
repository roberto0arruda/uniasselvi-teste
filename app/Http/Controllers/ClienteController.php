<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Http\Requests\ClienteValidationFormRequest;

class ClienteController extends Controller
{
    /**
     * Repository instance
     */
    private $clientes;

    /**
     * Create a new controller instance.
     *
     * @param  cliente  $clientes
     * @return void
     */
    public function __construct(cliente $clientes)
    {
        $this->clientes = $clientes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = $this->clientes->withTrashed()->get();

        return view('cliente.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteValidationFormRequest $request)
    {
        $dataForm = $request->except('_token');
        $dataForm['cpf'] = preg_replace("/[^0-9]/", "", $dataForm['cpf']);

        $cliente = $this->clientes->create($dataForm);

        if($cliente)
            return redirect()->route('clientes.index');
        else
            return "erro ao criar";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->clientes->where('id', $id)->with('pedidos')->first();

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = $this->clientes->find($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteValidationFormRequest $request, $id)
    {
        $dataForm = $request->input();
        $dataForm['cpf'] = preg_replace("/[^0-9]/", "", $dataForm['cpf']);

        $cliente = $this->clientes->find($id);
        $update = $cliente->update($dataForm);

        if($update)
            return redirect()->route('clientes.index');
        else
            return "erro ao atualizar";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->clientes->destroy($id);

        if($delete)
            return redirect()->route('clientes.index');
        else
            return "erro ao deletar";
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $cliente = $this->clientes->onlyTrashed()->findOrFail($id);
        $cliente->restore();

        return redirect()->route('clientes.index');
    }
}
