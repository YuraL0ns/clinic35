@extends('adminlte::page')
@section('title', 'Редактировать услугу')
@section('content_header')
    <h1>Редактировать услугу</h1>
@stop
@section('content')
    <form method="POST" action="{{ route('admin.services.edit.update', $service->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" role="tab" id="custom-content-below-home-tab" data-toggle="pill"
                       aria-controls="custom-content-below-home" aria-selected="true" href="#custom-content-below-home">
                        Основная информация
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" role="tab" id="custom-content-below-seo-tab" data-toggle="pill"
                       aria-controls="custom-content-below-seo" aria-selected="true" href="#custom-content-below-seo">
                        SEO информация
                    </a>
                </li>
            </ul>
        </div>
        <div class="box-body">
            <div class="tab-content" id="custom-content-below-tabContent">
                <div class="tab-pane fade active show" id="custom-content-below-home" role="tabpanel"
                     aria-labelledby="custom-content-below-home-tab">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="service_title">Название</label>
                            <input type="text" class="form-control" id="service_title" name="service_title"
                                   value="{{ $service->service_title }}">
                        </div>
                        <div class="form-group">
                            <label for="service_alias">Псевдоним</label>
                            <input type="text" class="form-control" id="service_alias" name="service_alias"
                                   value="{{ $service->service_alias }}">
                        </div>
                        <div class="form-group">
                            <label for="service_description">Описание услуги</label>
                            <textarea class="form-control" id="service_description"
                                      name="service_description">{{ $service->service_description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="service_description_pull">Доп. описание услуги</label>
                            <textarea class="form-control" id="service_description_pull"
                                      name="service_description_pull">{{ $service->service_description_pull }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="service_images">Изображение услуги</label>
                            <input type="file" id="service_images" name="service_images">
                            @if ($service->service_images)
                                <img src="{{ $service->service_images }}" alt="{{$service->service_title}}"
                                     style="max-width: 200px; margin-top: 10px;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="razdel_id">Раздел услуги (стоит уже выбранный)</label>
                            <select class="form-control" id="razdel_id" name="razdel_id">
                                @foreach($razdels as $razdel)
                                    <option value="{{ $razdel->id }}" {{ $service->razdel_id == $razdel->id ? 'selected' : '' }}>{{ $razdel->razdel_title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Другие поля формы здесь -->
                <div class="tab-pane " id="custom-content-below-seo" role="tabpanel"
                     aria-labelledby="custom-content-below-seo-tab">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="seo_title">SEO title</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title"
                                   value="{{ $service->seo_title }}">
                        </div>
                        <div class="form-group">
                            <label for="seo_description">SEO - description</label>
                            <input type="text" class="form-control" id="seo_description" name="seo_description"
                                   value="{{ $service->seo_description }}">
                        </div>
                        <div class="form-group">
                            <label for="seo_key">SEO - key</label>
                            <input type="text" class="form-control" id="seo_key" name="seo_key"
                                   value="{{ $service->seo_key }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Добавить специалиста</button>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </form>

@stop