<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use softDeletes;

    protected $fillable = ['nome', 'cpf', 'email'];

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    public function getCpfAttribute($cpf)
    {
        return setMaskCpf($cpf, '###.###.###-##');
    }
}
