@extends('adminlte::page')

@section('title', 'Панель управления - Первая многопрофильная клиника')

@section('content_header')
    <h1 class="m-0 text-dark">Редактирование {{$vacancy->vacancy_title}} </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card-body">
                <form action="{{route('admin.vacancy.update', ['vacancy', $vacancy->id])}}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-8">
                            <label for="vacancy_title">Название вакансии</label>
                            <input class="form-control" name="vacancy_title" id="vacancy_title" value="{{$vacancy->vacancy_title}}">
                        </div>

                        <div class="col-4">
                            <label for="vacancy_alias">Алиас</label>
                            <input class="form-control" name="vacancy_alias" id="vacancy_alias" value="{{$vacancy->vacancy_alias}}">
                        </div>
                    </div>

                    <label for="vacancy_description">Описание вакансии</label>
                    <x-bbcode />
                    <textarea name="vacancy_description" id="vacancy_description" class="form-control" rows="18">{!! $vacancy->vacancy_description !!}</textarea>

                    <div class="row">
                        <div class="col-4">
                            <label for="vacancy_price">Зарплата</label>
                            <input class="form-control" name="vacancy_price" id="vacancy_price" value="{{$vacancy->vacancy_price}}">
                        </div>

                        <div class="col-4">
                            <label for="vacancy_visible">Вакансия активна?</label>
                            <select id="vacancy_visible" name="vacancy_visible" class="form-control">
                                <option value="1" {{ $vacancy->vacancy_visible == 1 ? 'selected' : '' }}>Да</option>
                                <option value="0" {{ $vacancy->vacancy_visible == 0 ? 'selected' : '' }}>Нет</option>

                            </select>
                        </div>

                        <div class="col-4">
                            <label for="vacancy_images">Изображение ваканскии</label>
                            <input type="file" name="vacancy_images" id="vacancy_images" class="form-control-file" value="{{$vacancy->vacancy_images}}">
                            @if ($vacancy->vacancy_images)
                                <img src="{{ $vacancy->vacancy_images }}" alt="{{$vacancy->vacancy_title}}" style="max-width: 200px; margin-top: 10px;">
                            @endif
                        </div>
                    </div>

                    <label for="seo_title">SEO Title</label>
                    <input class="form-control" name="seo_title" id="seo_title" value="{{$vacancy->seo_title}}">

                    <label for="seo_description">SEO Description</label>
                    <input class="form-control" name="seo_description" id="seo_description" value="{{$vacancy->seo_description}}">

                    <label for="seo_key">SEO Keywords</label>
                    <input class="form-control mb-4" name="seo_key" id="seo_key" value="{{$vacancy->seo_key}}">


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