@extends('adminlte::page')

@section('title', 'Добавить акцию')

@section('content_header')
    <h1 class="m-0 text-dark">Добавить новую акцию</h1>
@stop

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-primary alert-dismissible bg-success text-white border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
    @endif

    <div class="box box-primary">

        <form role="form" action="{{ route('admin.sales.create.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" role="tab" id="custom-content-below-home-tab" data-toggle="pill" aria-controls="custom-content-below-home" aria-selected="true" href="#custom-content-below-home">
                            Основная информация об акции
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" role="tab" id="custom-content-below-seo-tab" data-toggle="pill" aria-controls="custom-content-below-seo" aria-selected="true" href="#custom-content-below-seo">
                            SEO информация об акции
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
                                <input type="text" class="form-control" id="sales_title" name="sales_title"
                                       placeholder="Анализы на права со скидкой 15%">
                            </div>
                            <div class="form-group">
                                <label for="sales_alias">Автоматическое создание алиаса</label>
                                <input type="text" class="form-control" id="sales_alias" name="sales_alias">
                            </div>
                            <div class="form-group">
                                <label for="sales_description">Описание акции</label>
                                <textarea type="text" class="form-control" id="sales_description"
                                          name="sales_description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="sales_images">Изображение акции</label>
                                <input type="file" id="sales_images" name="sales_images">
                            </div>
                        </div>

                    </div>
                    {{--SEO Box - add --}}
                    <div class="tab-pane " id="custom-content-below-seo" role="tabpanel"
                         aria-labelledby="custom-content-below-seo-tab">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="seo_title">SEO - Название акции</label>
                                <input type="text" class="form-control" id="seo_title" name="seo_title"
                                       placeholder="Название">
                            </div>
                            <div class="form-group">
                                <label for="seo_description">SEO - Описание</label>
                                <input type="text" class="form-control" id="seo_description" name="seo_description"
                                       placeholder="от 10 - до 70 слов">
                            </div>
                            <div class="form-group">
                                <label for="seo_key">SEO - Ключи поиска</label>
                                <input type="text" class="form-control" id="seo_key" name="seo_key"
                                       placeholder="Если необходимо, казываем через запятую">
                            </div>
                            <!-- Add more fields for other doctor information -->

                        </div>
                    </div>
                </div>




            </div>
            <!-- /.box-body -->

            <div class="card-body">
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Добавить акцию</button>
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
            let doctorName = document.getElementById('sales_title');
            let doctorAlias = document.getElementById('sales_alias');

            doctorName.addEventListener('input', function () {
                doctorAlias.value = translit(this.value);
            });
        }
    </script>
@stop