@extends('categoria.layouts.app')
@section('content')
<div class="row">
<div class="col-lg-11">
<h2>Categorias</h2>
</div>
<div class="col-lg-1">
<a class="btn btn-success" href="{{ route('categoria.create') }}">Agregar</a>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>No</th>
<th>Nombre Categoria</th>
<th>Descripcion</th>
<th width="280px">Action</th>
</tr>
@php
$i = 0;
@endphp
@foreach ($categoria as $categori)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $categori->cat_nom }}</td>
<td>{{ $categori->cat_obs }}</td>
<td>
<form action="{{ route('categoria.destroy',$categori->id) }}" method="POST">
<a class="btn btn-info" href="{{ route('categoria.show',$categori->id) }}">Ver</a>
<a class="btn btn-primary" href="{{ route('categoria.edit',$categori->id) }}">Editar</a>
@csrf

@method('DELETE')
<button type="submit" class="btn btn-danger">Eliminar</button>
</form>
</td>
</tr>
@endforeach
</table>
@endsection