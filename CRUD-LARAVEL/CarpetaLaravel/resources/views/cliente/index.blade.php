@extends('layouts.app')

@section('content')


@if($errors->any())
<div class="alert alert-danger">
  <h4>Error</h4>
  <ul>
    @foreach($errors->all() as $error)
    <li>{{error}}</li>
    @endforeach
  </ul>
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success">
  <h4>exito</h4>
{{session()->get('success')}}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
  <h4>error :</h4>
  {{session()->get('error')}}
</div>
@endif



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Nuevo Cliente
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form class="modal-content" action="/cliente" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar Nuevo Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      @csrf
  <div class="form-group">
    <label for="nit">Nit</label>
    <input type="text" name="nit" class="form-control" id="nit" aria-describedby="emailHelp" required="" >
  </div>
  <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" class="form-control" id="exampleInputPassword1" required="" >
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
</form>
    </div>
  </div>
</div>

<div class="table-responsive-sm">
<table class="table table-striped" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nit</th>
      <th scope="col">Nombre</th>
      <th scope=col>Eliminar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dat as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>

      <td>{{$user->nit}}</td>
      <td> {{$user->nombre}}</td>
      <td><a href="#" onclick="event.preventDefault(); document.getElementById('eliminar').submit();">eliminar
      </a>
      <form  id="eliminar" action="{{ route('cliente.destroy',$user->id)}}" method="post">
             <input name="_method" type="hidden" value="DELETE">
             <input type="hidden" name="_token" value="{{ csrf_token()}}">
             </form>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
</div>

@endsection
