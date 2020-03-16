@extends('layouts.app')

@section('content')
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav nav-tabs">
                    @each('order._components._spines', $response, 'res', 'key')
                </ul>
            </div>
        </div>
        <div class="tab-content">
            @each('order._components._bodyGroup', $response, 'res', 'key')
        </div>
@endsection