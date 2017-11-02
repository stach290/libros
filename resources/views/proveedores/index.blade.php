@extends('menuPrincipal')

@section('content')
<a href="proveedores/create">Nuevo proveedor</a>
<br>
<br>

{{session("mensaje") }}

<table border="1">
	<tr>
		<th>razon_social</th>
		<th>domicilio</th>
		<th>email</th>
		<th>celular</th>
		<th>telefono_fijo</th>
		<th>-</th>
    </tr>

    @foreach ($proveedores_list as $proveedor)

   	<tr>
		<td>{{ $proveedor->razon_social}}</td>
		<td>{{ $proveedor->domicilio}}</td>
		<td>{{ $proveedor->email}}</td>
		<td>{{ $proveedor->celular}}</td>
		<td>{{ $proveedor->telefono_fijo}}</td>
		<td>
		<a href="proveedores/{{$proveedor->id}}/edit">Modificar</a>
		<a href="proveedores/{{$proveedor->id}}">Eliminar</a>	
		</td>
    </tr>

    @endforeach
</table>
@endsection