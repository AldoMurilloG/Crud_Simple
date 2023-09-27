<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(5);

        return view('products.index', compact('products'));
    }

    public function store(Request $request): RedirectResponse
    {
        // Validacion de los datos
        $validated = $request->validate(
            [
                'name' => 'required|unique:products|max:20',
                'description' => 'nullable|string|max:255',
                'unit_price' => 'required|numeric|min:00000000|max:99999999',
                'stock' => 'required|integer|min:00000000|max:99999999',
            ],
            [
                'name.required' => 'El nombre es obligatorio.',
                'name.unique' => 'El nombre ya está registrado',
                'name.string' => 'El nombre debe ser una cadena de texto.',
                'name.max' => 'El nombre no debe tener más de 20 caracteres.',
                'description.string' => 'La descripción debe ser una cadena de texto.',
                'description.max' => 'La descripción no debe tener más de 255 caracteres.',
                'unit_price.required' => 'El precio unitario es obligatorio.',
                'unit_price.numeric' => 'El precio unitario debe ser un número.',
                'unit_price.min' => 'El precio unitario debe ser mayor que 0.',
                'unit_price.max' => 'El stock debe ser menor a 99.999.999.',
                'stock.integer' => 'El stock debe ser un número entero.',
                'stock.min' => 'El stock debe ser mayor a 0.',
                'stock.max' => 'El stock debe ser menor a 99.999.999.',
                'stock.required' => 'El stock es requirido',
            ]);
        // Guardado de los datos
        if ($validated) {
            Product::create($request->all());
        };
        // Redireccion con un mensaje flash de sesion
        return redirect()->route('products.index')->with('status', 'Producto creado satisfactoriamente!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view( 'products.edit', [ 'product' => $product ]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function update( Request $request, $id )
    {
        // Busqueda del producto
        $product = Product::findOrFail($id);
        //Validación de los datos
        // Actualización del producto
        $product->update( $request->all() );
        //redirección con un mensaje flash de sesión
        return redirect()->route( 'products.index' )->with( 'status', 'Producto actualizado satisfactoriamente' );
    }
    public function destroy($id)
    {
        // Busqueda del producto
        $product = Product::findOrFail($id);
        // Eliminación del producto
        $product->delete();
        //redirección con un mensaje flash de sesión
        return redirect()->route( 'products.index' )->with( 'status', 'Producto actualizado satisfactoriamente!' );
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view( 'products.show', [ 'product' => $product ]);
    }
}
