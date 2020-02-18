@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                {{var_dump(Session::all())}}
                <div class="card-body">
                    <form method="POST" action="{{ route('create-productos') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">{{ __('Precio') }}</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}" required autocomplete="precio">

                                @error('precio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_proveedor" class="col-md-4 col-form-label text-md-right">{{ __('Proveedor') }}</label>

                            <div class="col-md-6">
                                <select id="id_proveedor" class="custom-select custom-select-lg mb-3 form-control @error('id_proveedor') is-invalid @enderror" name="id_proveedor" value="{{ old('id_proveedor') }}" required autocomplete="id_proveedor">
                                    <option selected>Proveedor</option>
                                    @foreach ($proveedores as $proveedor)
                                        <option value="{{$proveedor->id}}">{{$proveedor->nombre}}</option>
                                    @endforeach
                                  </select>

                                @error('departamento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="existencia" class="col-md-4 col-form-label text-md-right">{{ __('Existencia') }}</label>

                            <div class="col-md-6">
                                <input id="existencia" type="number" class="form-control @error('existencia') is-invalid @enderror" name="existencia" value="{{ old('existencia') }}" required autocomplete="existencia" autofocus>

                                @if($errors->has('existencia'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cantidad_minima" class="col-md-4 col-form-label text-md-right">{{ __('Cantidad mínima') }}</label>

                            <div class="col-md-6">
                                <input id="cantidad_minima" type="number" class="form-control @error('cantidad_minima') is-invalid @enderror" name="cantidad_minima" required autocomplete="cantidad_minima">

                                @error('cantidad_minima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cantidad_maxima" class="col-md-4 col-form-label text-md-right">{{ __('Cantudad Máxima') }}</label>

                            <div class="col-md-6">
                                <input id="cantidad_maxima" type="number" class="form-control @error('cantidad_maxima') is-invalid @enderror" name="cantidad_maxima" required autocomplete="cantidad_maxima">

                                @error('cantidad_maxima')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Capturar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
