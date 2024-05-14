@extends('adminlte::page')

@section('title', 'Edit Doctor')

@section('content_header')
    <h1>Редактирование Акции: <b>{{$sales->sales_title}}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">

                <form role="form" action="{{ route('admin.sales.edit.update', ['sales' => $sales->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="doctor_name">Название акции</label>
                            <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ $sales->sales_title }}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_alias">Алиас страницы</label>
                            <input type="text" class="form-control" id="doctor_alias" name="doctor_alias" value="{{ $sales->sales_title }}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_students">Описание Акции</label>
                            <textarea value="{{$sales->sales_description}}" name="sales_description" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="sales_image">Sales Image</label>
                            <input type="file" id="sales_images" name="sales_images">
                            @if ($sales->sales_images)
                                <img src="{{ $sales->sales_images }}" style="max-width: 200px; margin-top: 10px;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="eo_key">SEO Ключи</label>
                            <input type="text" class="form-control" id="doctor_seo_key" name="doctor_seo_key" value="{{ $sales->seo_key }}">
                        </div>
                        <div class="form-group">
                            <label for="seo_title">SEO Название</label>
                            <input type="text" class="form-control" id="doctor_seo_title" name="doctor_seo_title" value="{{ $sales->seo_title }}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_seo_description">SEO Описание</label>
                            <input type="text" class="form-control" id="doctor_seo_description" name="doctor_seo_description" value="{{ $sales->seo_description }}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_seo_another">Other SEO Tags</label>
                            <input type="text" class="form-control" id="doctor_seo_another" name="doctor_seo_another" value="{{ $sales->sales_seo_another }}">
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