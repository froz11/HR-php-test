<tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->vendor->name }}</td>
    <td>@includeIf('product._components._price')</td>
</tr>
