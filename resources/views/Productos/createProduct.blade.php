@extends('layouts.app')

@section('tittle')
Productos
@endsection
@section('sub')
Lista de Productos
@endsection
@section('content')
    <div class="col-md-12 d-flex justify-content-center">
    <div class="card  mt-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-body">
            <form class="user" action="{{isset($product)?route('productos.update',$product->IdProducto):route('productos.store')}}" method="POST">
                @csrf
                @if(isset($product))
                @method('put')
                @endif
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="nombre" value="{{isset($product)?$product->nombre:''}}" id="nombre" placeholder="Nombre">
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="number" class=" form-control form-control-user " name="cantidad" value="{{isset($product)?$product->cantidad:''}}" id="cantidad" placeholder="Cantidad">
                        </div>
                        <div class="col">
                            <input type="number" class=" form-control form-control-user " name="precio" value="{{isset($product)?$product->precio:''}}" id="precio" placeholder="Precio">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="estado" value="1">

                <button class="btn btn-primary btn-block " type="submit">{{isset($product)?'Editar':'Registrar'}}</button> 
            </form> 
            <hr>
            <div class="text-center">
                <a class="small" href="{{ route('productos.index') }}">
                    <button class="btn btn-outline-dark"> Volver</button>
                </a>
            </div>
        </div>
    </div>
   
</div>



@endsection