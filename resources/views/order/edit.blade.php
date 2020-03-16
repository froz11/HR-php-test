@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Form::open(['route' => ['orders.update', $order->id], 'method'=>'PATCH']) !!}
{{--        {!! Form::token(); !!}--}}
        <div class="form-group">
        {!! Form::label('client_email', 'Адрес e-mail'); !!}
        {!! Form::email('client_email', $order->client_email, $attributes = array()); !!}
        </div>
        <div class="form-group">
        {!! Form::label('partner_id', 'Партнер'); !!}
        {!! Form::select('partner_id', $partners, 'S'); !!}
        </div>
        <div class="form-group">
        {!! Form::label('products', 'Продукты'); !!}
        <ul class="list-unstyled" name="products">
            @each('order._components._label', $order->orderProduct, 'value')
        </ul>
        </div>
        <div class="form-group">
        {!! Form::label('status', 'Статус заказа'); !!}
        {!! Form::select('status', $order->statuses(), 'S'); !!}
        </div>
        <div class="form-group">
        {!! Form::label('null', "Общая сумма {$order->sum->sum}"); !!}
        </div>

        {!! Form::submit('Сохранить', ['class'=>"btn btn-primary"]); !!}
        {!! Form::close() !!}

    </div>
@endsection