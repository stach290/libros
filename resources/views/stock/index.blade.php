@extends('menuPrincipal')

@section('content')
<br><br>

{{session("mensaje") }}

<table border="1">
	<tr>
		<th>Libro</th>
		<th>Cantidad Minima</th>
		<th>Cantidad Actual</th>
		<th>-</th>
    </tr>

    @foreach ($stock_list as $stock)

   	<tr>
		<td>{{ $stock->libro->titulo}}</td>
		<td>{{ $stock->cantidad_minima}}</td>
		<td>{{ $stock->cantidad_actual}}</td>
		<td>
		<a href="stock/{{$stock->id}}/edit">Modificar</a>
		</td>
    </tr>

    @endforeach
</table>
@endsection