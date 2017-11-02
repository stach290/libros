@extends('menuPrincipal')

@section('content')
Libro: {{$libro->titulo}}
<br><br>

<form method="post" action="{{ asset('libros/'. $libro->id ) }}">
	{{method_field('delete') }}
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="submit" value="Eliminar">
</form>
@endsection