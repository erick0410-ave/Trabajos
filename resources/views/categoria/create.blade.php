@extends('categoria.layouts.app')
@section('content')
<div class="row">
<div class="col-lg-11">
<h2>Agregar Nueva Categoria</h2>
</div>
<div class="col-lg-1">
<a class="btn btn-primary" href="{{ url('categoria') }}"> Back</a>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('categoria.store') }}" method="POST">
@csrf

<div class="form-group">
	<label for="txtNombreCategoria">Nombre Categoria:</label>
	<input type="text" class="form-control" id="txtNombreCategoria" placeholder="Nombre Categoria" name="txtNombreEvento">
</div>

<div class="form-group">
	<label for="txtDescripcion">Descripción:</label>
	<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="10" placeholder="Descripción"></textarea>
</div>

<button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection