@extends('adminlte::page')

@section('title', 'Добавить услугу')

@section('content_header')
    <h1 class="m-0 text-dark">Добавить новую услугу</h1>
@stop

@section('content')
    <div class="box box-primary">
        <form role="form" action="{{ route('admin.services.create.store') }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" role="tab" id="custom-content-below-home-tab" data-toggle="pill"
                           aria-controls="custom-content-below-home" aria-selected="true"
                           href="#custom-content-below-home">
                            Основная информация о добовляемой услуге
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" role="tab" id="custom-content-below-seo-tab" data-toggle="pill"
                           aria-controls="custom-content-below-seo" aria-selected="true"
                           href="#custom-content-below-seo">
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
                                <label for="service_title">Название услуги</label>
                                <input type="text" class="form-control" id="service_title" name="service_title"
                                       placeholder="Хирургия">
                            </div>
                            <div class="form-group">
                                <label for="service_alias">Автоматическое создание алиаса</label>
                                <input type="text" class="form-control" id="service_alias" name="service_alias"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="service_description">Описание услуги</label>
                                <textarea type="text" class="form-control" id="service_description" name="service_description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="service_description_pull">Доп. описание услуги</label>
                                <textarea type="text" class="form-control" id="service_description_pull" name="service_description_pull"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="razdel_id">Раздел</label>
                                <select class="form-control" id="razdel_id" name="razdel_id">
                                    @foreach($razdels as $item)
                                        <option value="{{$item->id}}">{{$item->razdel_title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="service_images">Изображение</label>
                                <input class="form-control" type="file" id="service_images" name="service_images">
                            </div>
                        </div>
                    </div>
                    {{--SEO Box - add --}}
                    <div class="tab-pane " id="custom-content-below-seo" role="tabpanel"
                         aria-labelledby="custom-content-below-seo-tab">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="seo_title">SEO - Название</label>
                                <input type="text" class="form-control" id="seo_title" name="seo_title"
                                       placeholder="Врач хирург Иванов Иван Иванович ™">
                            </div>
                            <div class="form-group">
                                <label for="seo_description">SEO - Описание</label>
                                <input type="text" class="form-control" id="seo_description"
                                       name="seo_description" placeholder="от 10 - до 70 слов">
                            </div>
                            <div class="form-group">
                                <label for="seo_key">SEO - ключи</label>
                                <input type="text" class="form-control" id="seo_key" name="seo_key"
                                       placeholder="Ключи для поиска">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Добавить услугу</button>
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
            let doctorName = document.getElementById('service_title');
            let doctorAlias = document.getElementById('service_alias');

            doctorName.addEventListener('input', function () {
                doctorAlias.value = translit(this.value);
            });
        }
    </script>
@stop