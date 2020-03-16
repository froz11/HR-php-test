    {!! Form::open(['route' => ['products.update', $product->id], 'id' => 'price_update']) !!}
    {!! Form::text('price', $product->price, ['id' => 'price_input']) !!}
    {!! Form::close() !!}