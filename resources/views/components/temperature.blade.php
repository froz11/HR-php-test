@inject('temperature', 'App\Services\TemperatureService')
@section('temperature')
    Температура в брянске: {{ $temperature->temper('Брянск', 'RU') }} гр.
@endsection