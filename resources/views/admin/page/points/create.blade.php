@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Список всех расценок</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Добавить новый поинт к услуге</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.point.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="point_title">Заголовок:</label>
                            <input type="text" class="form-control" id="point_title" name="point_title" required>
                        </div>
                        <div class="form-group">
                            <label for="point_price">Цена:</label>
                            <input type="text" class="form-control" id="point_price" name="point_price" required>
                        </div>
                        <div class="form-group">
                            <label for="point_okvd">OKVD:</label>
                            <input type="text" class="form-control" id="point_okvd" name="point_okvd" required>
                        </div>
                        <div class="form-group">
                            <label for="service_id">Выберите услугу:</label>
                            <select class="form-control" id="service_id" name="service_id" required>
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->service_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить поинт</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop