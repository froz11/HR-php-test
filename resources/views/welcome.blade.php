@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Тестовое задание
                </div>

                <div class="m-b-md">
                    Выполнил все пункты включая допы, код писа с использованием сервисного слоя и репозиториев, все задания в верхнем меню, <br>
                    температура кликабельна, смена цены продуктов с использованием json автоматически при изменении цены в поле, <br>
                    шаблон по распределенной логике минимум дублируемого кода так как температура получается по координатам не уверен что она точная, <br>
                    координаты Брянска беру с карт онлайн, сервис отификаций при статусе комплит тестировал на mailtrap. <br>
                    Разработку вел в phpstorm + среда на docker (nginx+php7.4+mysql5.7) на yii2 тот же функционал сделал бы в двое быстрее опыта на нем побольше да и gii генерирует практически готовый CRUD
                </div>
            </div>
        </div>
    </body>
</html>
@endsection