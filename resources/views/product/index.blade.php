@extends('layouts.app')

@section('content')

<div class="tab-content">
    <div class="tab-pane active">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>ид_продукта</th>
                <th>наименование_продукта</th>
                <th>наименование_поставщика</th>
                <th>цена</th>
            </tr>
            </thead>
            <tbody>
            @each('product._components._tab', $products, 'product')
            <tbody>
        </table>
    </div>
   <div> {{ $products->links() }} </div>
</div>
@endsection