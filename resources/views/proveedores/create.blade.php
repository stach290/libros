@extends('menuPrincipal')

@section('content')
{{session("mensaje") }}
<br>
<br>

<form method="POST" action="{{ asset('proveedores') }}">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  razon_social: <input type="text" name="txtRazon_social"><br>

  Domicilio: <input type="text" name="txtDomicilio"><br>

  Email: <input type="text" name="txtEmail"><br>

  celular: <input type="text" name="txtCelular"><br>

  Telefono Fijo: <input type="text" name="txtTelefono_fijo"><br>

  <input type="submit" value="Guardar datos">
</form>

<br>
<br>
<a href="/libros/public/proveedores">Listado</a>
@endsection