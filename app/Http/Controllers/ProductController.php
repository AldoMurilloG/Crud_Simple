<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    
public function index() {
    $products = Product::paginate(5);
    
    return view( 'products.index', compact( 'products' ) );
}

public function store( Request $request ) 
{
    // Validacion de los datos
    $validated = $request->validate([
        'name' => 'required|unique:products|max:20',
        'description' => 'nullable|unique:products|max:255',
        'unit_price' => 'numeric|required|unique:products|min:00000000|max:99999999',
        'stock' => 'numeric|required|unique:products|min:00000000|max:99999999',
    ]);
     // Guardado de los datos
    if ($validated) {
        Product::create( $request->all() );
    };
    // Redireccion con un mensaje flash de sesion
    return redirect()->route( 'products.index' )->with( 'status', 'Producto creado satisfactoriamente!' );
}

public function edit( $id ) {
    $product = Product::findOrFail();
}

public function create() {
    return view('products.create');
}

}
