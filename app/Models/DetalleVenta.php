<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    public $table = 'DetalleProductos';

    protected $primaryKey = 'IdDetalle';

    public static $rules = [
        'IdVenta'=>'required|exists:Venta,IdVenta',
        'IdProducto'=>'required|exists:Producto,IdProducto',
        'Precio'=>'required|min:0|max:100000',
        'Cantidad'=>'required|min:0|max:1000'
    ];

    public $timestamps = false;

    public function productos(){
        return $this->belongsTo('App\Models\Producto', 'IdProducto', 'IdProducto');
    }
}
