<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Proveedor;
use App\Models\Stock;

class LibroController extends Controller
{
    public function index()
    {
    	$libros_list = Libro::all();
    	return view("libros.index", ["libros_list" => $libros_list]);   	
    }

    public function create()
    {
        $proveedores_list = Proveedor::all();
    	return view("libros.create", ["proveedores_list" => $proveedores_list]);
    }

    public function store(Request $request)
    {
    	// obtener datos enviados desde formulario
    	$titulo = $request->input("txtTitulo");
    	$editorial = $request->input("txtEditorial");
    	$autor = $request->input("txtAutor");
    	$fecha_edicion = $request->input("txtFechaEdicion");
    	$tipo_tapa = $request->input("cboTipoTapa");
        $genero = $request->input("cboGenero");
        $precio = $request->input("txtPrecio");
        $proveedor_id = $request->input("cboProveedor");

    	// crear nueva Libro
    	$libro = new Libro();
    	$libro->titulo = $titulo;
    	$libro->editorial = $editorial;
    	$libro->autor = $autor;
    	$libro->fecha_edicion = $fecha_edicion;
    	$libro->tipo_tapa = $tipo_tapa;
        $libro->genero = $genero;
        $libro->precio = $precio;      
        $libro->proveedor_id = $proveedor_id;
    	$libro->save();

        //nuevo stock
        $stock = new Stock();
        $stock->libro_id = $libro->id;        
        $stock->save();

        $mensaje = "Libro creado correctamente";

        return redirect("libros/create")->with("mensaje", $mensaje);

    }

    public function show($id)
    {
        $libro = Libro::find($id);
        return view("libros.show",["libro"=>$libro]);
    }
    public function destroy($id)
    {
        $libro= Libro::find($id);
        $libro->delete();

        $mensaje = "libro eliminado correctamente!";
        return redirect("libros")->with("mensaje", $mensaje);
    }

    public function edit($id)
    {
        $libro = Libro::find($id);
        $proveedores_list = Proveedor::all();
        return view("libros.edit",     
        ["libro"=>$libro, "proveedores_list"=>$proveedores_list]);
    }

    public function update(Request $request,$id)
    {
        //obtener datos del formulario
        $titulo = $request->input("txtTitulo");
        $editorial = $request->input("txtEditorial");
        $autor = $request->input("txtAutor");
        $fecha_edicion = $request->input("txtFechaEdicion");
        $tipo_tapa = $request->input("cboTipoTapa");
        $genero = $request->input("cboGenero");
        $precio = $request->input("txtPrecio");
        $proveedor_id = $request->input("cboProveedor");

        // obtener el libro a modificar
        $libro = Libro::find($id);

        //asignar datos del libro
        $libro = new Libro();
        $libro->titulo = $titulo;
        $libro->editorial = $editorial;
        $libro->autor = $autor;
        $libro->fecha_edicion = $fecha_edicion;
        $libro->tipo_tapa = $tipo_tapa;
        $libro->genero = $genero;
        $libro->precio = $precio;
        $libro->proveedor_id = $proveedor_id;
        $libro->save();

        $mensaje = "libro modificado correctamente!";
        return redirect("libros/" . $id . "/edit")->with("mensaje", $mensaje);
    }
}