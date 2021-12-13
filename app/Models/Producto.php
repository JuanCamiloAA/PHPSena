<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    
    public $table = 'Productos';

    protected $primaryKey = 'IdProducto';

    public $fillable = ['nombre', 'cantidad', 'precio', 'estado']; 

    public static $rules = [
        'nombre'=>'required|min:3|max:100|string',
        'cantidad'=>'required|min:0|max:1000',
        'precio'=>'required|min:0|max:100000',
        'estado'=>'in:1,0'
    ];

    public $timestamps = false;


}
