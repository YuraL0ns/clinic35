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
                            <label for="doctor_name">Doctor Name</label>
                            <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ $sales->sales_title }}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_alias">Doctor Alias</label>
                            <input type="text" class="form-control" id="doctor_alias" name="doctor_alias" value="{{ $sales->sales_title }}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_students">Doctor Students</label>
                            <input type="text" class="form-control" id="doctor_students" name="doctor_students" value="{{ $sales->sales_desc }}">
                        </div>

                        <div class="form-group">
                            <label for="doctor_img">Doctor Image</label>
                            <input type="file" id="doctor_img" name="doctor_img">
                            @if ($sales->sales_img)
                                <img src="{{ $sales->sales_img }}" alt="Doctor Image" style="max-width: 200px; margin-top: 10px;">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="doctor_seo_key">SEO Keywords</label>
                            <input type="text" class="form-control" id="doctor_seo_key" name="doctor_seo_key" value="{{ $sales->sales_seo_key }}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_seo_title">SEO Title</label>
                            <input type="text" class="form-control" id="doctor_seo_title" name="doctor_seo_title" value="{{ $sales->sales_seo_title }}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_seo_description">SEO Description</label>
                            <input type="text" class="form-control" id="doctor_seo_description" name="doctor_seo_description" value="{{ $sales->sales_seo_description }}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_seo_another">Other SEO Tags</label>
                            <input type="text" class="form-control" id="doctor_seo_another" name="doctor_seo_another" value="{{ $sales->sales_seo_another }}">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection