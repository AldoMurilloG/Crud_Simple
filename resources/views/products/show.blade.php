@extends('layouts.app')

@section( 'title', 'Vista del Producto #' . $product->id )

@section( 'content' )
    <h1>Vista del Producto #{{ $product->id }}</h1>

    @if( $errors->any() )
        <ul>
            @foreach ( $errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
        <ul class="list-group">
            <li class="list-group-item"><strong><u>ID:</strong></u> {{ $product->id }}</li>
            <li class="list-group-item"><strong><u>Nombre:</strong></u> {{ $product->name }}</li>
            <li class="list-group-item"><strong><u>Descripción:</strong></u> {{ $product->descripcion }}</li>
            <li class="list-group-item"><strong><u>Precio Unitario:</strong></u> {{ $product->unit_price }}</li>
            <li class="list-group-item"><strong><u>Stock:</strong></u> {{ $product->stock }}</li>
            <li class="list-group-item"><strong><u>Ultima actualización:</strong></u> {{ $product->updated_at }}</li>
        </ul>
        
        <br>
    </form>
@endsection

