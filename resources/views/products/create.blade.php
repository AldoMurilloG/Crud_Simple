@extends( 'layouts.app' )

@section( 'title', 'Crear un nuevo Producto' )

@section( 'content' )
    <h1 class="text-center">Crear un nuevo Producto</h1>

    @if ( $errors->any() )
        <div class="alert alert-danger">
            <ul>
                @foreach ( $errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row d-flex justify-content-center">
<div class="col-10">
    <form action="{{ route( 'products.store' ) }}" method="POST" novalidate>
        @csrf

        <label for="name" class="form-label">Nombre: </label>
        <input type="text" name="name" value="{{ old( 'name' ) }}" class="form-control" maxlength="22">

        <br>

        <label for="description" class="form-label">Descripción: </label> <br>
        <textarea name="decription" cols="30" rows="10" maxlength="255" class="form-control">{{ old( 'unit_price' ) }}</textarea>

        <br>

        <label for="unit_price" class="form-label">Precio Unitario: </label>
        <input type="number" name="unit_price" value="{{ old( 'unit_price' ) }}" class="form-control">

        <br>

        <label for="stock" class="form-label">Stock: </label>
        <input type="number" name="stock" value="{{ old( 'stock' ) }}" class="form-control">

        <br>

        <button type="submit" class="btn btn-primary">Guardar Producto</button>
        <a href="{{ route( 'products.index' ) }}" class="btn btn-danger">Cancelar</a>
    </form>
</div></div>
@endsection