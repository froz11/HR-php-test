@includeIf('components.temperature')
@section('head')
    @parent
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('orders.index') }}">Заказы</a>
                    </li>
                    <li>
                        <a href="{{ route('groupOrders') }}">Заказы по группам</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}">Продукты</a>
                    </li>
                    <li>
                        <a href="{{ route('temper') }}">@yield('temperature')</a>
                </ul>
            </div>
        </div>
    </nav>
@endsection