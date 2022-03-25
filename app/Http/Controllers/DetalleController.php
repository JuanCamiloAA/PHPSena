<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Models\Venta;
use App\Models\DetalleVenta;
use DB;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::where('estado',1)->where('cantidad','!=',0)->get();
        return view("Ventas.create", compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();
        try {
            DB::beginTransaction();
            $venta = Venta::create([
                'nombre_Cliente' => $input["nombre_cliente"],
                'precio' => $this->precio($input["producto_id"], $input["cantidades"]),
                'estado' => 1,
            ]);
            
            foreach($input["producto_id"] as $key => $value){
                DetalleVenta::create([
                    "IdVentas" => $venta->IdVenta,
                    "IdProducto" => $value,
                    "cantidad" => $input["cantidades"][$key],
                ]);

                $prod = Producto::find($value);
                $prod ->update([
                    "cantidad" => $prod ->cantidad - $input["cantidades"][$key],
                ]);
            }

            DB::commit();
            alert()->success('Venta','Venta realizada con exito.');
            return redirect()->route('ventas.index');
        } catch (\Exception $e) {
           DB::rollback();
           alert()->error('Venta', $e);
           return redirect()->route('ventas.index');

        }

    }
    public function precio($id, $cant){
        $precio = 0;
        foreach($id as $key => $value){
            $productos = Producto::find($value);
            $precio += ($productos->precio * $cant[$key]);
        }
        return $precio;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
