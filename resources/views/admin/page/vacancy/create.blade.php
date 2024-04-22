@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Новая вакансия</h1>
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
            let doctorName = document.getElementById('vacancy_title');
            let doctorAlias = document.getElementById('vacancy_alias');

            doctorName.addEventListener('input', function () {
                doctorAlias.value = translit(this.value);
            });
        }
    </script>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <form action="{{route('admin.vacancy.store')}}" method="post" enctype="multipart/form-data">

                    @csrf
                        <div class="row">
                            <div class="col-8">
                                <label for="vacancy_title">Название вакансии</label>
                                <input class="form-control" name="vacancy_title" id="vacancy_title" placeholder="Название вакансии">
                            </div>

                            <div class="col-4">
                                <label for="vacancy_alias">Алиас</label>
                                <input class="form-control" name="vacancy_alias" id="vacancy_alias" placeholder="Название вакансии (автоматическо-заполняемое поле)">
                            </div>
                        </div>

                        <label for="vacancy_description">Описание вакансии</label>
                        <x-bbcode />
                        <textarea name="vacancy_description" id="vacancy_description" class="form-control" rows="18"></textarea>

                        <div class="row">
                            <div class="col-4">
                                <label for="vacancy_price">Зарплата</label>
                                <input class="form-control" name="vacancy_price" id="vacancy_price" placeholder="З/П вакансии">
                            </div>

                           <div class="col-4">
                               <label for="vacancy_visible">Вакансия активна?</label>
                               <select id="vacancy_visible" name="vacancy_visible" class="form-control">
                                   <option value="1" selected>Да</option>
                                   <option value="1">Нет</option>
                               </select>
                           </div>

                            <div class="col-4">
                                <label for="vacancy_images">Изображение ваканскии</label>
                                <input type="file" name="vacancy_images" id="vacancy_images" class="form-control-file">
                            </div>
                        </div>

                        <label for="">SEO Title</label>
                        <input class="form-control" name="vacancy_title" id="vacancy_title" placeholder="SEO тайтл">

                        <label for="">SEO Description</label>
                        <input class="form-control" name="vacancy_title" id="vacancy_title" placeholder="SEO Description">

                        <label for="">SEO Keywords</label>
                        <input class="form-control mb-4" name="vacancy_title" id="vacancy_title" placeholder="SEO Keywords">


                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Данные внесены',
            text: '{{ session('success') }}',
        });
        @endif
    </script>

    <script>
        function formatText(command) {
            event.preventDefault()
            let textArea = document.getElementById("vacancy_description");
            let start = textArea.selectionStart;
            let end = textArea.selectionEnd;
            let selectedText = textArea.value.substring(start, end);
            let beforeText = textArea.value.substring(0, start);
            let afterText = textArea.value.substring(end);

            switch(command) {
                case 'bold':
                    textArea.value = beforeText + '<b>' + selectedText + '</b>' + afterText;
                    break;
                case 'italic':
                    textArea.value = beforeText + '<i>' + selectedText + '</i>' + afterText;
                    break;
                case 'underline':
                    textArea.value = beforeText + '<u>' + selectedText + '</u>' + afterText;
                    break;
                case 'list':
                    let listItems = selectedText.split('\n').map(item => `<li>${item}</li>`).join('');
                    textArea.value = beforeText + '<ul>' + listItems + '</ul>' + afterText;
                    break;
                case 'itemList':
                    textArea.value = beforeText + '<li>' + selectedText + '</li>' + afterText;
                    break
                case 'br':
                    textArea.value = beforeText + selectedText + '<br>' + afterText;
                    break;
                default:
                    console.log('Unknown command.');
            }
        }
    </script>
@endsection