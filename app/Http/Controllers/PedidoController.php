<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Produto;

class PedidoController extends Controller
{
    /**
     * Repository instance
     */
    private $pedidos;

    /**
     * Create a new controller instance.
     *
     * @param  pedido  $pedidos
     * @return void
     */
    public function __construct(pedido $pedidos)
    {
        $this->pedidos = $pedidos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = $this->pedidos->withTrashed()->get();
        $clientes = Cliente::all();
        $produtos = Produto::All();

        return view('pedido.index', compact('pedidos', 'clientes', 'produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('pedido.create', compact('clientes', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataForm = [
            'cliente_id' => $request->input('cliente_id'),
            'status'     => 'A',
        ];

        $pedido = $this->pedidos->create($dataForm);
        $pedido->produtos()->attach($request->input('produtos'));

        if($pedido)
            return redirect()->route('pedidos.edit', $pedido->id);
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
        $pedido = $this->pedidos->where('id', $id)->withTrashed()->with(['cliente','produtos'])->first();
        $produtos = Produto::all();

        return view('pedido.show', compact('pedido', 'produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = $this->pedidos->where('id', $id)->withTrashed()->with(['cliente','produtos'])->first();
        $produtos = Produto::all();

        return view('pedido.edit', compact('pedido', 'produtos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = $this->pedidos->find($id);

        if (array_key_exists('produto_id', $request->all())) {
            $pedido->produtos()->detach($request->input('produto_id')); // remover produto
        } else {
            $pedido->produtos()->attach($request->input('produtos')); // inserir produtos
        }

        if ($request->input('desconto'))
            $pedido->update(['desconto' => $request->input('desconto')]);

        if ($request->input('receber'))
            $pedido->update(['status' => 'P']);

        return redirect()->route('pedidos.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = $this->pedidos->findOrFail($id);
        $pedido->update(['status'=>'C']);
        $delete = $pedido->delete();

        if($delete)
            return redirect()->route('pedidos.index');
        else
            return "erro ao deletar";
    }
}
