<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    public $table = 'Ventas';

    protected $primaryKey = 'IdVenta';

    public $fillable = ['Cliente', 'Precio', 'Estado']; 

    public static $rules = [
        'Cliente'=>'required|min:3|max:100|string',
        'Precio'=>'required|min:0|max:100000',
        'estado'=>'in:1,0'
    ];

    public $timestamps = false;
    public function Detalle(){
        return $this->belongsTo('App\Models\DetalleVenta', 'producto', 'IdDetalle');
    }
}
