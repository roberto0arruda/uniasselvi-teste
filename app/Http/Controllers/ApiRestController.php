<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\Pedido;

class ApiRestController extends Controller
{
    public function users()
    {
        return User::all();
    }

    public function produtos()
    {
        return Produto::all();
    }

    public function produtosSearch($search)
    {
        // return Produto::find($is);
        return ['search' => $search];
    }

    public function clientes()
    {
        return Cliente::all();
    }

    public function pedidos()
    {
        return Pedido::with(['cliente', 'produtos'])->get();
    }
}

