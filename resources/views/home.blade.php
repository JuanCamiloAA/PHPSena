@extends('layouts.app')

@section('tittle')
Usuarios
@endsection

@section('content')
<div class="col-12">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ __('You are logged in!') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- {{ __('You are logged in!') }} -->
</div>
                   
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id#</th>
                                                <th>Nombre user</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                            </tr>
                                        </thead>
                                        <!-- <tfoot>
                                            <tr>
                                                <th>Id#</th>
                                                <th>Nombre user</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                            </tr>
                                        </tfoot> -->
                                        <tbody>
                                        @foreach($Users as $value)
                                                <tr>
                                                    <td>{{ $value->id}}</td>
                                                    <td>{{ $value->name }}</td>
                                                    <td>{{ $value->email }}</td>
                                                    <td>{{ $value->password }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
