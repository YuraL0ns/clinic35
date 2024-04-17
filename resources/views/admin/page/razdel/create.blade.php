@extends('adminlte::page')

@section('title', 'Добавить раздел')

@section('content_header')
    <h1 class="m-0 text-dark">Добавить новый раздел</h1>
@stop

@section('content')
    <div class="box box-primary">
        <form role="form" action="{{ route('admin.razdel.create.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">

                <div class="form-group">
                    <label for="razdel_title">Название раздела</label>
                    <input type="text" class="form-control" id="razdel_title" name="razdel_title"
                           placeholder="Взрослое отделение">
                </div>
                <div class="form-group">
                    <label for="razdel_alias">Автоматическое создание алиаса</label>
                    <input type="text" class="form-control" id="razdel_alias" name="razdel_alias" placeholder="">
                </div>

                <div class="form-group">
                    <label for="razdel_images">Изображение разредела</label>
                    <input type="file" id="razdel_images" name="razdel_images">
                </div>
            </div>

            <div class="card-body">
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Добавить раздел</button>
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
            let doctorName = document.getElementById('razdel_title');
            let doctorAlias = document.getElementById('razdel_alias');

            doctorName.addEventListener('input', function () {
                doctorAlias.value = translit(this.value);
            });
        }
    </script>
@stop