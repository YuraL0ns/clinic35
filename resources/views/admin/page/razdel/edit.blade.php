@extends('adminlte::page')

@section('title', 'Edit rzdel')

@section('content_header')
    <h1>Редактирование Акции: <b>{{$razdel->razdel_title}}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">

                <form role="form" action="{{ route('admin.razdel.edit.update', ['razdel' => $razdel->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="razdel_title">Razdel Name</label>
                            <input type="text" class="form-control" id="razdel_title" name="razdel_title" value="{{ $razdel->razdel_title }}">
                        </div>
                        <div class="form-group">
                            <label for="razdel_alias">Razdel Alias</label>
                            <input type="text" class="form-control" id="razdel_alias" name="razdel_alias" value="{{ $razdel->razdel_alias }}">
                        </div>
                        <div class="form-group">
                            <label for="razdel_images">Razdel Image</label>
                            <input type="file" id="razdel_images" name="razdel_images">
                            @if ($razdel->razdel_images)
                                <img src="{{ $razdel->razdel_images }}" alt="Doctor Image" style="max-width: 200px; margin-top: 10px;">
                            @endif
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