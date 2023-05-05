@extends('layouts.plantilla') 

@section('titulo', 'Lista de Notas')
@section('contenido')

  <br><br>
  @if (session('mensaje'))
    <div class="alert alert-success">
      {{ session('mensaje') }}
    </div>
  @endif
  
  <div class="container">
    <h4>Gestion de Notas</h4>
    <div class="row">
      <div class="col-xl-12">
        <form action="{{ route('nota.index')}}" method="get">
          <div class="form-row">
            <div class="col-sm-4">
              <input type="text" class="form-control" name="buscar" value="{{$texto}}">
            </div>
            <div class="col-auto">
              <br>
              <input type="submit" class="btn btn-primary" value="Buscar">
              <a class="btn btn-warning" href="{{ route('nota.index') }}">Volver</a>
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
  <h1><center>LISTA DE NOTAS</center></h1>
  </div>

  <a class="btn btn-outline-primary" href="{{ route('nota.create') }}">Añadir una Nota Nuevo</a>
    
  <br>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col"><center>Texto</center></th>
          <th scope="col"><center>Fecha</center></th>
          <th scope="col">Id del Contacto</th>
          <th colspan="4"><center>Acciones</center></th>
        </tr>
      </thead>
      <tbody>
      
        @forelse ( $notas as $nota )
          <tr>
            <th scope="row">{{ $nota->id }}</th>
            <td>{{ $nota->texto }} </td>
            <td>{{ $nota->fecha }}</td>
            <td>{{ $nota->contacto_id }}</td>
            <td> <a  class="btn btn-success" href="{{ route('nota.mostrar' , ['id'=>$nota->id]) }}" >Ver</a>
            <td><a  class="btn btn-warning" href="{{ route('nota.edit' , ['id'=>$nota->id]) }}" >Editar</a></td>
            <td>
                  <form method="POST" action="{{ route('nota.borrar', ['id'=>$nota->id]) }}">
                      @csrf
                      @method('delete')
                      <input type="submit" value="Eliminar" class="btn btn-danger">
                    </form>
            </td>
         </tr>
        @empty
          <tr>
            <td colspan="4">No hay Notas Registradas</td>
          </tr>
        @endforelse
      </tbody>
    </table>  
    {{ $notas->render('pagination::bootstrap-4') }}
@endsection