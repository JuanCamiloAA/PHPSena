@extends('layouts.app')

@section('tittle')
Ventas
@endsection
@section('sub')
Lista de Ventas
@endsection
@section('content')
<div class="container">
    
<div class="row">
    <div class="col-12 mb-3">
        <a href="{{Route('detalle.create')}}">
            <button class="btn btn-primary ">
                <i class="fas fa-plus-square"></i>
                <span class="px-2"> Agregar</span>
            </button>
        </a>
    </div>
</div>
    <div class="row justify-content-center">
        <!-- <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('tittle')</div> -->

                <!-- <div class="card-body"> -->
                                    
                    <div class="col-12">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header">@yield('tittle')</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id#</th>
                                                <th>Nombre Cliente</th>
                                                <th>Productos</th>
                                                <th>Precio</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Id#</th>
                                                <th>Nombre Cliente</th>
                                                <th>Productos</th>
                                                <th>Precio</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($Ventas as $Key => $value)
                                                <tr>
                                                    <td>{{ $value['IdVenta']}}</td>
                                                    <td>{{ $value['Cliente'] }}</td>
                                                    <td>{{ $value->Detalle->productos['nombre'] }}</td>
                                                    <td>{{ $value['Precio'] }}</td>
                                                    <td>
                                                        @if($value['estado'])
                                                            <span class="badge badge-success">Activo</span>
                                                        @elseif(!$value['estado'])
                                                            <span class="badge badge-danger">Desactivado</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{route('productos.show')}}"></a> Editar
                                                        <br>
                                                        Cambiar
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                <!-- </div>
            </div>
        </div> -->
    </div>
</div>



@endsection