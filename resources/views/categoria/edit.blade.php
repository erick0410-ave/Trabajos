@extends('categoria.layouts.app')
@section('content')
<div class="row">
<div class="col-lg-11">
<h2>Actualizar Categoria</h2>
</div>
<div class="col-lg-1">
<a class="btn btn-primary" href="{{ url('categoria') }}"> Regresar</a>
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
<form method="post" action="{{ route('categoria.update',$categoria->id) }}" >
@method('PATCH')
@csrf

<div class="form-group">
	<label for="txtNombreCategoria">Nombre Categoria:</label>
	<input type="text" class="form-control" id="txtNombreCategoria" placeholder="Nombre Categoria" name="txtNombreEvento" value="{{ $categoria->cat_nom }}">
</div>

<div class="form-group">
	<label for="txtDescripcion">Descripción:</label>
	<textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="10" placeholder="Descripción">
		{{ $categoria->cat_obs }}
	</textarea>
</div>

<button type="submit" class="btn btn-default">Submit</button>
</form>
@endsection