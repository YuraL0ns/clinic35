@extends('adminlte::page')

@section('title', 'Edit Doctor')

@section('content_header')
    <h1>Редактирование Акции: <b>{{$sales->sales_title}}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <form role="form" action="{{ route('admin.sales.edit.update', ['sales' => $sales->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" role="tab" id="custom-content-below-home-tab" data-toggle="pill" aria-controls="custom-content-below-home" aria-selected="true" href="#custom-content-below-home">
                                    Основная информация о докторе
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" role="tab" id="custom-content-below-seo-tab" data-toggle="pill" aria-controls="custom-content-below-seo" aria-selected="true" href="#custom-content-below-seo">
                                    SEO информация о докторе
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="box-body">
                        <div class="tab-content" id="custom-content-below-tabContent">
                            <div class="tab-pane fade active show" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="sales_title">Название акции</label>
                                        <input type="text" class="form-control" id="sales_title" name="sales_title" value="{{ $sales->sales_title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sales_alias">Алиас страницы</label>
                                        <input type="text" class="form-control" id="sales_alias" name="sales_alias" value="{{ $sales->sales_alias }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sales_description">Описание Акции</label>
                                        <textarea  name="sales_description" class="form-control">
                                            {!! $sales->sales_description !!}
                                        </textarea>
                                    </div>


                        <div class="form-group">
                            <label for="sales_image">Sales Image</label>
                            <input type="file" id="sales_images" name="sales_images">
                            @if ($sales->sales_images)
                                <img src="{{ $sales->sales_images }}" style="max-width: 200px; margin-top: 10px;">
                            @endif
                        </div>
                                </div>
                            </div>
                            <div class="tab-pane " id="custom-content-below-seo" role="tabpanel" aria-labelledby="custom-content-below-seo-tab">
                                <div class="card-body">
                        <div class="form-group">
                            <label for="seo_title">SEO Название</label>
                            <input type="text" class="form-control" id="doctor_seo_title" name="doctor_seo_title" value="{{ $sales->seo_title }}">
                        </div>
                        <div class="form-group">
                            <label for="eo_key">SEO Ключи</label>
                            <input type="text" class="form-control" id="doctor_seo_key" name="doctor_seo_key" value="{{ $sales->seo_key }}">
                        </div>

                        <div class="form-group">
                            <label for="doctor_seo_description">SEO Описание</label>
                            <input type="text" class="form-control" id="doctor_seo_description" name="doctor_seo_description" value="{{ $sales->seo_description }}">
                        </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Изменить</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection