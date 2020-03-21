@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">nombre</th>
                            <th scope="col">precio</th>
                            <th scope="col">id_proveedor</th>
                            <th scope="col">existencia</th>
                            <th scope="col">cantidad_minima</th>
                            <th scope="col">cantidad_maxima</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($productos as $producto)
                            <tr>
                            <th scope="row">{{$producto->nombre}}</th>
                                <td>{{$producto->precio}}</td>
                                <td>{{$producto->id_proveedor}}</td>
                                <td>{{$producto->existencia}}</td>
                                <td>{{$producto->cantidad_minima}}</td>
                                <td>{{$producto->cantidad_maxima}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
