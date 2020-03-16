@extends('layouts.app')

@section('content')

<div class="tab-content">
    <div class="tab-pane active">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>ид_заказа</th>
                <th>название_партнера</th>
                <th>стоимость_заказа</th>
                <th>наименование_состав_заказа</th>
                <th>статус_заказа</th>
                <th>дата_доставки</th>
            </tr>
            </thead>
            <tbody>
            @each('order._components._tab', $orders, 'order')
            <tbody>
        </table>
    </div>
</div>
@endsection