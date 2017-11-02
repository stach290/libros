@extends('menuPrincipal')

@section('content')
{{session("mensaje") }}
<br>
<br>

<form method="POST" action="{{ asset('libros/' . $libro->id) }}">

  <input type="hidden" name="_method" value="PUT">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  Titulo del Libro: <input type="text" name="txtTitulo" 
  value="{{ $libro->titulo }}"><br>

  Editorial: <input type="text" name="txtEditorial" 
  value="{{ $libro->txtEditorial }}"><br>

  Autor: <input type="text" name="txtAutor" 
  value="{{ $libro->txtAutor }}"><br>

  Fecha de Edicion: <input type="date" name="txtFechaEdicion" 
  value="{{ $libro->txtFechaEdicion }}"><br>

  Tipo de Tapa: 
<select name="cboTipoTapa" value="{{ $libro->cboTipoTapa }}">
    <option value="Dura">Dura</option>
    <option value="Blanda">Blanda</option>
    <option value="Carton">Carton</option>
    <option value="Tela">Tela</option>
  </select>
  <br>

  Genero:
  <select name="cboGenero" value="{{ $libro->cboGenero }}">
    <option value="Drama">Drama</option>
    <option value="Aventura">Aventura</option>
    <option value="Terror">Terror</option>
    <option value="Fantasia">Fantasia</option>
  </select>
  <br>

  Precio: <input type="double" name="txtPrecio" 
  value="{{ $libro->txtPrecio }}"><br>

  Proveedor: 
  <select name="cboProveedor" value="{{ $libro->cboProveedor }}">
    @foreach ($proveedores_list as $proveedor)
      <option value="{{$proveedor->id}}">{{$proveedor->razon_social}}</option>
    @endforeach
  </select>
  <br>

  <input type="submit" value="Modificar datos">
</form>

<br>
<br>
<a href="/libros/public/libros">Listado</a>
@endsection