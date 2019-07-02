<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Pedido extends Model
{
    use softDeletes;

    protected $fillable = ['cliente_id', 'status', 'vlr_bruto', 'desconto', 'vlr_liquido'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getVlrBrutoAttribute()
    {
        return $this->produtos()->sum('valor');
    }

    public function getVlrLiquidoAttribute($value)
    {
        return ($this->vlr_bruto - $this->desconto);
    }

    public function type($type)
    {
        $types = [
            'A' => '<li class="list-group-item list-group-item-info">Em Aaberto</li>',
            'P' => '<li class="list-group-item list-group-item-success">pago</li>',
            'C' => '<li class="list-group-item list-group-item-danger">cancelado</li>',
        ];

        return $types[$type];
    }
}