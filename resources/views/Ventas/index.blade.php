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
                                        @foreach($Ventas as $value)
                                                <tr>
                                                    <td>{{$value->IdVentas}}</td>
                                                    <td>{{ $value->nombre_Cliente }}</td>
                                                    <td>{{ $value->nombre_Producto }}</td>
                                                    <td>{{ $value->precio }}</td>
                                                    <td class="text-center">
                                                        @if($value->estado)
                                                            <span class="badge badge-success">Activo</span>
                                                        @elseif(!$value->estado)
                                                            <span class="badge badge-danger">Desactivado</span>
                                                        @endif
                                                    </td>
                                                    <td class=" d-flex justify-content-around " >

                                                        <a href="" class="text-warning"><i class="fas fa-edit"></i></a>

                                                        @if($value->estado)
                                                            <a href="" class="text-danger"><i class="fas fa-times-circle"></i></a>
                                                        @elseif(!$value->estado)
                                                            <a href="" class="text-success"><i class="fas fa-check-circle"></i></a>
                                                        @endif
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