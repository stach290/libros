@extends('menuPrincipal')

@section('content')
{{session("mensaje") }}
<br>
<br>

<form method="POST" action="{{ asset('proveedores/' . $proveedor->id) }}">

  <input type="hidden" name="_method" value="PUT">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  Razon Social: <input type="text" name="txtRazon_social" value="{{ $proveedor->razon_social }}"><br>

  Domicilio: <input type="text" name="txtDomicilio" value="{{ $proveedor->domicilio }}"><br>

  Email: <input type="text" name="txtEmail" value="{{ $proveedor->email }}"><br>

  Celular: <input type="text" name="txtCelular" value="{{ $proveedor->celular }}"><br>

  Telefono Fijo: <input type="text" name="txtTelefono_fijo" value="{{ $proveedor->telefono_fijo }}"><br>

  <input type="submit" value="Modificar datos">
</form>

<br>
<br>
<a href="/libros/public/proveedores">Listado</a>
@endsection