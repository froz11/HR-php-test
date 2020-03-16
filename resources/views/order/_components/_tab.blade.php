<tr>
    <td><a href="{{ route('orders.edit', ['id' => $order->id]) }}" target="_blank">{{ $order->id }}</a></td>
    <td>{{ $order->partner->name }}</td>
    <td>{{ $order->sum->sum }}</td>
    <td>
        <ul>
            @foreach($order->products as $product)
                <li>{{ $product->name }}</li>
            @endforeach
        </ul>
    </td>
    <td>{{ $order->status_name }} </td>
    <td>{{ $order->delivery_dt }}</td>
</tr>
