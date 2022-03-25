<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    public $table = 'detalle_ventas';

    protected $primaryKey = 'IdDetalle';

    public $fillable = ['IdVentas', 'IdProducto', 'cantidad']; 


    public static $rules = [
        'IdVentas'=>'required|exists:Venta,IdVenta',
        'IdProducto'=>'required|exists:Producto,IdProducto',
        'cantidad'=>'required|min:0|max:1000'
    ];

    public $timestamps = false;

    public function productos(){
        return $this->belongsTo('App\Models\Producto', 'IdProducto', 'IdProducto');
    }
}
