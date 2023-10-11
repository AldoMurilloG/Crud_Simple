@extends( 'layouts.app' )

@section( 'title', 'Listado de Productos' )

@section( 'content' )
    @if ( session( 'status' ) )
        <div class="alert alert-sucess">
            {{ session( 'status' ) }}
        </div>
    @endif

    <a href="{{ route( 'products.create' ) }}" class="btn btn-primary">Agregar</a>

    @if ($products->count())
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio Unitario</th>
                    <th>Stock</th>
                    <th>Ultima actualización</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            {{ $product->id }}
                        </td>
                        <td>
                            {{ $product->name }}
                        </td>
                        <td>
                            $ {{ $product->unit_price }}
                        </td>
                        <td>
                            {{ $product->stock }}
                        </td>
                        <td>
                            {{ $product->updated_at }}
                        </td>
                        <!-- Botones de acción VER, EDITAR y ELIMINAR -->
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                
                                <a href="{{ route( 'products.show', $product->id) }}"><button type="button" class="btn btn-info">Ver</button></a>

                                <a href="{{ route( 'products.edit', $product->id) }}"><button type="button" class="btn btn-primary">Editar</button></a>
                                
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf @method( 'DELETE' )
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    @else
        <h4>¡No hay productos cargados!</h4>
    @endif
@endsection
