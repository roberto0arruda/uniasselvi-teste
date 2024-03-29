<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Http\Requests\ProdutoValidationFormRequest;

class ProdutoController extends Controller
{
    /**
     * Repository instance
     */
    private $produtos;

    /**
     * Create a new controller instance.
     *
     * @param  produto  $produtos
     * @return void
     */
    public function __construct(produto $produtos)
    {
        $this->produtos = $produtos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produtos->all();

        return view('produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoValidationFormRequest $request)
    {
        $dataForm = $request->except('_token');

        $produto = $this->produtos->create($dataForm);

        if($produto)
            return redirect()->route('produtos.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produtos->find($id);

        return view('produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoValidationFormRequest $request, $id)
    {
        $dataForm = $request->input();

        $produto = $this->produtos->find($id);
        $update = $produto->update($dataForm);

        if($update)
            return redirect()->route('produtos.index');
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
        $delete = $this->produtos->destroy($id);

        if($delete)
            return redirect()->route('produtos.index');
        else
            return "erro ao deletar";
    }
}
