@extends( 'layouts.app' )

@section( 'title', 'Listado de Productos' )

@section( 'content' )
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
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    @else
        <h4>¡No hay productos cargados!</h4>
    @endif
@endsection
