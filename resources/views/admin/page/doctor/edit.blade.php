@extends('adminlte::page')

@section('title', 'Изменения' .' '. $doctor->doctor_name)

@section('content_header')
    <h1>Редактировать: {{$doctor->doctor_name}}</h1>
@stop

@section('js')
    <script>
        function translit(word) {
            var answer = '';
            var converter = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd',
                'е': 'e', 'ё': 'e', 'ж': 'zh', 'з': 'z', 'и': 'i',
                'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't',
                'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch',
                'ш': 'sh', 'щ': 'sch', 'ь': '', 'ы': 'y', 'ъ': '',
                'э': 'e', 'ю': 'yu', 'я': 'ya',

                'А': 'A', 'Б': 'B', 'В': 'V', 'Г': 'G', 'Д': 'D',
                'Е': 'E', 'Ё': 'E', 'Ж': 'Zh', 'З': 'Z', 'И': 'I',
                'Й': 'Y', 'К': 'K', 'Л': 'L', 'М': 'M', 'Н': 'N',
                'О': 'O', 'П': 'P', 'Р': 'R', 'С': 'S', 'Т': 'T',
                'У': 'U', 'Ф': 'F', 'Х': 'H', 'Ц': 'C', 'Ч': 'Ch',
                'Ш': 'Sh', 'Щ': 'Sch', 'Ь': '', 'Ы': 'Y', 'Ъ': '',
                'Э': 'E', 'Ю': 'Yu', 'Я': 'Ya', ' ': '-'
            };

            for (var i = 0; i < word.length; ++i) {
                if (converter[word[i]] == undefined) {
                    answer += word[i];
                } else {
                    answer += converter[word[i]];
                }
            }

            return answer;
        }

        window.onload = function () {
            let doctorName = document.getElementById('doctor_name');
            let doctorAlias = document.getElementById('doctor_alias');

            doctorName.addEventListener('input', function () {
                doctorAlias.value = translit(this.value);
            });
        }
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <!-- form start -->
                <form role="form" action="{{ route('admin.doctors.edit.update', ['doctor' => $doctor->id]) }}" method="POST" enctype="multipart/form-data">
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
                                        <label for="doctor_name">ФИО Специалиста</label>
                                        <input type="text" class="form-control" id="doctor_name" name="doctor_name" value="{{ $doctor->doctor_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="doctor_alias">Адресное имя доктора</label>
                                        <input type="text" class="form-control" id="doctor_alias" name="doctor_alias" value="{{ $doctor->doctor_alias }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="doctor_exp">Стаж работы специалиста</label>
                                        <input class="form-control" name="doctor_exp" id="doctor_exp" value="{{$doctor->doctor_exp}}"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="doctor_students">Обучение специалиста</label>
                                        <x-bbcode />
                                        <textarea class="form-control" name="doctor_students" id="doctor_students" cols="30" rows="10">{!! $doctor->doctor_students !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="doctor_spec">Специализация доктора</label>
                                        <input type="text" class="form-control" id="doctor_spec" name="doctor_spec" value="{{ $doctor->doctor_spec }}">
                                    </div>
                                    <div class="row">
                                       <div class="col-6">
                                           <div class="form-group">
                                               <label for="doctor_initial">Первичный приём специалиста</label>
                                               <input type="text" class="form-control" id="doctor_initial" name="doctor_initial" value="{{ $doctor->doctor_initial }}">
                                           </div>
                                       </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="doctor_secondary">Вторичный приём специалиста</label>
                                                <input type="text" class="form-control" id="doctor_secondary" name="doctor_secondary" value="{{ $doctor->doctor_secondary }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="doctor_images">Изображение специалиста</label>
                                        <input type="file" id="doctor_images" name="doctor_images">
                                        @if ($doctor->doctor_images)
                                            <img src="{{ $doctor->doctor_images }}" alt="{{$doctor->doctor_name}}" style="max-width: 200px; margin-top: 10px;">
                                        @endif
                                    </div>
                                    <div class="form-group">
                                    <label for="doctor_visible">Виден в списке докторов на сайте?</label>
                                    <select class="form-control" id="doctor_visible" name="doctor_visible">
                                        <option value="1" {{ $doctor->doctor_visible == 1 ? 'selected' : '' }}>Да</option>
                                        <option value="0" {{ $doctor->doctor_visible == 0 ? 'selected' : '' }}>Нет</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                                <div class="tab-pane " id="custom-content-below-seo" role="tabpanel" aria-labelledby="custom-content-below-seo-tab">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="seo_title">SEO Title (название вкладки)</label>
                                            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ $doctor->seo_title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_description">SEO Description (описание)</label>
                                            <input type="text" class="form-control" id="seo_description" name="seo_description" value="{{ $doctor->seo_description }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="seo_key">SEO Keywords(ключи)</label>
                                            <input type="text" class="form-control" id="seo_key" name="seo_key" value="{{ $doctor->seo_key }}">
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Сохранить измененя</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection
