@extends('layouts.plantilla')

@section('titulo', 'Producto')

@section('contenido')

<h1>Detalles de {{ $resultados->nombre }} {{ $resultados->apellido }}
</h1>

<table class="table">
    <thead class="table-dark">
      <tr>
        <th scope="col">Campos</th>
        <th scope="col">Valor</th>
      </tr>
    </thead>
    <tbody>
    @if(count($resultados) > 0)
  <ul>
    @foreach($resultados as $producto)
      <li>{{ $producto->nombre }}</li>
    @endforeach
  </ul>
@else
  <p>No se encontraron resultados</p>
@endif
    </tbody>

  </table>

  <br>
  <a class="btn btn-primary" href="{{ route('contacto.index') }}">Volver</a>
@endsection