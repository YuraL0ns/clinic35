@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Сообщения из форм на сайте</h1>
@stop

@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-4">
                <h1>Header</h1>
                @foreach($messages as $message)
                    @if($message->from === 'header')
                        {{$message->name}}
                    @endif
                @endforeach
            </div>
            <div class="col-4">
                <h1>Footer</h1>
                @foreach($messages as $message)
                    @if($message->from === 'footer')
                        {{$message->name}}
                    @endif
                @endforeach
            </div>
            <div class="col-4">
                <h1>Page</h1>
                @foreach($messages as $message)
                    @if($message->from === 'page-vacancy')
                        {{$message->name}}
                    @endif
                @endforeach
            </div>
        </div>



    </div>
@stop