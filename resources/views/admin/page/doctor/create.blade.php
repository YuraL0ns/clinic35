@extends('adminlte::page')

@section('title', 'Добавить специалиста')

@section('content_header')
    <h1 class="m-0 text-dark">Добавить нового специалиста</h1>
@stop

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-primary alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
    @endif

    <div class="box box-primary">

        <form role="form" action="{{ route('admin.doctors.create.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

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
                                <label for="doctor_name">ФИО специалиста</label>
                                <input type="text" class="form-control" id="doctor_name" name="doctor_name"  placeholder="Иванов Иван Иванович">
                            </div>
                            <div class="form-group">
                                <label for="doctor_alias">Автоматическое создание алиаса</label>
                                <input type="text" class="form-control" id="doctor_alias" name="doctor_alias" placeholder="" >
                            </div>
                            <div class="form-group">
                                <label for="doctor_students">Места обучения</label>
                                <x-bbcode />
                                <textarea type="text" class="form-control" id="doctor_students" name="doctor_students"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="doctor_spec">Специальности доктора</label>
                                <input type="text" class="form-control" id="doctor_spec" name="doctor_spec" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="doctor_initial">Цена первиченого приёма</label>
                                <input type="text" class="form-control" id="doctor_initial" name="doctor_initial" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="doctor_secondary">Цена вторичного приёма</label>
                                <input type="text" class="form-control" id="doctor_secondary" name="doctor_secondary" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="doctor_exp">С какого года работает врачем</label>
                                <input type="text" class="form-control" id="doctor_exp" name="doctor_exp" placeholder="2000 - (только цифру, с какого года)">
                            </div>
                            <div class="form-group">
                                <label for="visible">Отображать на сайте?</label>
                                <select class="form-control" id="doctor_visible" name="doctor_visible">
                                    <option value="1">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="doctor_images">Фото специалиста</label>
                                <input type="file" id="doctor_images" name="doctor_images">
                            </div>
                        </div>

                    </div>
                    {{--SEO Box - add --}}
                    <div class="tab-pane " id="custom-content-below-seo" role="tabpanel" aria-labelledby="custom-content-below-seo-tab">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="seo_title">SEO - Имя специалиста для вкладок, а так же для поисковой выдачи</label>
                                <input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="Врач общей практки Иванов Иван Иванович">
                            </div>
                            <div class="form-group">
                                <label for="seo_description">SEO - Описание для специалиста</label>
                                <input type="text" class="form-control" id="seo_description" name="seo_description" placeholder="от 10 - до 70 слов">
                            </div>
                            <div class="form-group">
                                <label for="seo_key"><span class="babge badge-danger">Пока что поле не трогаем</span>SEO - Ключи поиска для специалиста</label>
                                <input type="text" class="form-control" id="seo_key" name="seo_key" placeholder="Если необходимо, казываем через запятую">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="card-body">
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Добавить специалиста</button>
                </div>
            </div>
        </form>
    </div>
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