@extends('menuPrincipal')

@section('content')
<a href="libros/create">Nuevo Libro</a>
<br>
<br>

{{session("mensaje") }}

<table border="1">
	<tr>
		<th>titulo</th>
		<th>editorial</th>
		<th>autor</th>
		<th>fecha_edicion</th>
		<th>tipo_tapa</th>
		<th>genero</th>
		<th>precio</th>
		<th>proveedor_id</th>
		<th>-</th>
    </tr>

    @foreach ($libros_list as $libro)

   	<tr>
		<td>{{ $libro->titulo}}</td>
		<td>{{ $libro->editorial}}</td>
		<td>{{ $libro->autor}}</td>
		<td>{{ $libro->fecha_edicion}}</td>
		<td>{{ $libro->tipo_tapa}}</td>
		<td>{{ $libro->genero}}</td>
		<td>{{ $libro->precio}}</td>
		<td>{{ $libro->proveedor_id}}</td>
		<td>
		<a href="libros/{{$libro->id}}/edit">Modificar</a>
		<a href="libros/{{$libro->id}}">Eliminar</a>	
		</td>
    </tr>

    @endforeach
</table>
@endsection