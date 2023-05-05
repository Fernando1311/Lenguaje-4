@extends('layouts.plantilla') 

@section('titulo', 'Lista de Eventos')
@section('contenido')

  <br><br>
  @if (session('mensaje'))
    <div class="alert alert-success">
      {{ session('mensaje') }}
    </div>
  @endif
  
  <div class="container">
    <h4>Gestion de Eventos</h4>
    <div class="row">
      <div class="col-xl-12">
        <form action="{{ route('evento.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscar" value="{{$texto}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-warning" href="{{ route('evento.index') }}">Volver</a>
            </div>
          </div>
        </form>
      </div>
      <div class="col-xl-12">
      </div>
    </div>
  </div>

  <div>
    <br><br>
  <h1><center>LISTA DE EVENTOS</center></h1>
  </div>

  <a class="btn btn-outline-primary" href="{{ route('evento.crear') }}">Añadir un Evento Nuevo</a>
    
  <br>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col"><center>Titulo</center></th>
          <th scope="col"><center>Descripcion</center></th>
          <th scope="col">Fecha de Inicio</th>
          <th scope="col">Fecha de Finalizacion</th>
          <th scope="col">Id del Contacto</th>
          <th colspan="4"><center>Acciones</center></th>
        </tr>
      </thead>
      <tbody>
      
        @forelse ( $eventos as $evento )
          <tr>
            <th scope="row">{{ $evento->id }}</th>
            <td>{{ $evento->titulo }} </td>
            <td>{{ $evento->descripcion }}</td>
            <td>{{ $evento->fecha_inicio }}</td>
            <td>{{ $evento->fecha_fin }}</td>
            <td>{{ $evento->contacto_id }}</td>
            <td> <a  class="btn btn-success" href="{{ route('evento.mostrar' , ['id'=>$evento->id]) }}" >Ver</a>
            <td><a  class="btn btn-warning" href="{{ route('evento.edit' , ['id'=>$evento->id]) }}" >Editar</a></td>
            <td>
                  <form method="POST" action="{{ route('evento.borrar', ['id'=>$evento->id]) }}">
                      @csrf
                      @method('delete')
                      <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
            </td>
         </tr>
        @empty
          <tr>
            <td colspan="4">No hay Eventos Exitentes</td>
          </tr>
        @endforelse
      </tbody>
    </table>  
    {{ $eventos->render('pagination::bootstrap-4') }}
@endsection