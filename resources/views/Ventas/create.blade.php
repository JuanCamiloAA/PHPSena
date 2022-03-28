@extends('layouts.app')

@section('content')


<div class="col-md-12 d-flex justify-content-center">

    <div class="card  mt-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
            <form action="{{route('detalle.store')}}" method="post" >
                @csrf
                <div class="form-group">
                <div class="row">
                <div class="col-12" id="alt"></div>
                </div>
                    <div class="row">
                        <div class="col">
                           <input class="form-control" type="text" name="nombre_cliente" id="name" placeholder="Cliente"> 
                        </div>
                        <div class="col">
                            <select class="form-control" name="producto" id="producto" onchange="todo()">
                                <option value="" selected>Productos</option>
                                @foreach($productos as $value)
                                    <option precio="{{ $value->precio }}" cant="{{$value->cantidad}}" value="{{ $value->IdProducto }}">{{ $value->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" name="cant" id="canti">
                            <input class="form-control" type="number" name="cantidad" id="cantidad" placeholder="Cantidad">
                        </div>
                        <div class="col">
                            <input class="form-control" type="number" name="precio" id="precio" placeholder="precio" readonly>
                        </div>
                    </div>
                </div>
                <!-- <div class="col"> -->
                    <input class="form-control" type="number" name="precio_total" id="precio_total" placeholder="precio Total" readonly>
                <!-- </div> -->
                
                <button class="btn btn-success my-3" onclick="agregar_producto()" type="button">
                    <i class="fas fa-plus"></i>
                    <span> Agregar</span>
                </button>

                <table  class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Subtotal</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="tblProductos">
                   
                </tbody>
            </table>
                <button type="submit" class="btn btn-primary btn-block my-3">Crear</button>
            </form>
           
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('ventas.index') }}">
                    <button class="btn btn-outline-dark"> Volver</button>
                </a>
            </div>
        </div>
    </div>
   
</div>

@endsection

@section('script')
<script>

    function todo(){
        cargar_precio(),
        cargar_cantidad()
    }

     function cargar_precio() {

        let precio = $("#producto option:selected").attr("precio");

        $("#precio").val(precio);
        
        
    };
    function cargar_cantidad() {

    let cant = $("#producto option:selected").attr("cant");

    $("#canti").val(cant);


    };

    function agregar_producto() {
        let producto_id = $("#producto option:selected").val();
        let producto_text = $("#producto option:selected").text();
        let cantidad = $("#cantidad").val();
        let precio = $("#precio").val();
        let cant = $("#canti").val();
        if (cantidad < cant) {
            
            $("#tblProductos").append(`
            <tr id="tr-${producto_id}">
                
                    <input type="hidden" name="producto_id[]" value="${producto_id}"/>
                    <input type="hidden" name="cantidades[]" value="${cantidad}"/>
                <td>
                    ${producto_text}
                </td>
                <td>${cantidad}</td>
                <td>${precio}</td>
                <td>${parseInt(precio)* parseInt(cantidad)}</td>
                <td class="text-center">
                    <button  type="button" class="btn text-danger" onclick="eliminar(${producto_id},(${parseInt(cantidad) * parseInt(precio)}))"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            `);
        
        let precioT = $("#precio_total").val() || 0;
        $("#precio_total").val(parseInt(precioT) + (parseInt(precio)* parseInt(cantidad)));


        $("#producto").val('');
        $("#cantidad").val('');
        $("#precio").val('');
        } else {
            $("#alt").append(`
            <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                <strong>¡Atención! {{ Auth::user()->name }}</strong>
                <hr> 
                 -${producto_text}- insuficiente, ${cant} productos disponibles.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            `)
            
        }
        
    };

    function eliminar(id, precio){
        $("#tr-"+id).remove();
        let precioT = $("#precio_total").val() || 0;
        $("#precio_total").val(parseInt(precioT) - precio);
    };

</script>
   

@endsection