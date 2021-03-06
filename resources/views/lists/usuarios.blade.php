@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">Dashboard</div>
                <form action="{{ route('search-usuarios') }}" method="POST" role="search">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="q"
                            placeholder="Buscar usuarios por nombre"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Telefono</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($usuarios as $usuario)
                            <tr>
                            <th scope="row">{{$usuario->id}}</th>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>{{$usuario->departamento}}</td>
                                <td>{{$usuario->telefono}}</td>
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
