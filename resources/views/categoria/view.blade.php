@extends('categoria.layouts.app')
@section('content')
<div class="row">
<div class="col-lg-11">
<h2>Categorias</h2>
</div>
<div class="col-lg-1">
<a class="btn btn-primary" href="{{ url('categoria') }}">Regresar</a>
</div>
</div>
<table class="table table-bordered">
<tr>
<th>Nombre Evento:</th>
<td>{{ $categoria->cat_nom }}</td>
</tr>

<tr>
<th>Descripcion:</th>
<td>{{ $categoria->cat_obs }}</td>
</tr>
</table>
@endsection