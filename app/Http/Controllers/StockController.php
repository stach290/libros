<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
    	$stock_list = Stock::all();
    	return view("stock.index", ["stock_list" => $stock_list]);   	
    }

    public function edit($id)
    {
        $stock = Stock::find($id);
        return view("stock.edit",["stock"=>$stock]);
    }

    public function update(Request $request,$id)
    {
        //obtener datos del formulario
        $cantidad_actual = $request->input("txtCantidadActual");
        $cantidad_minima = $request->input("txtCantidadMinima");

        //validacion
        if ($cantidad_actual < $cantidad_minima) {
            $mensaje = "LA CANTIDAD ACTUAL DEBE SER MAYOR A LA MINIMA";
            return redirect("stock/" . $id . "/edit")->with("mensaje", $mensaje);
        }

        // obtener el libro a modificar
        $stock = Stock::find($id);
        $stock->cantidad_actual = $cantidad_actual;
        $stock->cantidad_minima = $cantidad_minima;
        $stock->save();

        $mensaje = "Stock Actualizado!";
        return redirect("stock/" . $id . "/edit")->with("mensaje", $mensaje);
    }
}