@extends('adminlte::page')

@section('title', 'Редактирование страницы')

@section('content_header')
    <h1>Редактирование страницы</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Форма редактирования информации о странице -->
                <form action="{{route('admin.contacts.edit.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Название страницы -->
                    <div class="form-group">
                        <label for="title">Название страницы</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $page->title }}" required>
                    </div>

                    <!-- Описание страницы -->
                    <div class="form-group">
                        <label for="description">Описание страницы</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required>{{ $page->description }}</textarea>
                    </div>

                    <!-- Загрузка изображений -->
                    <div class="form-group">
                        <label for="images">Изображения</label>
                        <input type="file" class="form-control-file" id="images" name="images[]" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <!-- Ваши дополнительные стили -->
@stop

@section('js')
    <script>
        console.log('Page editing!');
    </script>
@stop


@extends('admin.template.default')
@section('admin_page_title', 'Редактировать информацию на странице Документы')
@section('admin_area')

@if(Session::has('success'))
<div class="alert alert-primary alert-dismissible bg-success text-white border-0 fade show" role="alert">
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    {{session('success')}}
  </div>
@endif


<form action="{{route('admin.contacts.edit.post')}}" method="POST">
    @csrf
    <div id="mws-bbcodes">
        <button class="btn btn-primary bbcode-button" data-start="<strong>" data-end="</strong>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-bold">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M7 5h6a3.5 3.5 0 0 1 0 7h-6z" />
                <path d="M13 12h1a3.5 3.5 0 0 1 0 7h-7v-7" />
              </svg>
        </button>
        <button class="btn btn-primary bbcode-button" data-start="<i>" data-end="</i>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-currency-cent">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M16.007 7.54a5.965 5.965 0 0 0 -4.008 -1.54a6 6 0 0 0 -5.992 6c0 3.314 2.682 6 5.992 6a5.965 5.965 0 0 0 4 -1.536" />
                <path d="M12 20v-2" />
                <path d="M12 6v-2" />
              </svg>
        </button>
        <button class="btn btn-primary bbcode-button" data-start="<u>" data-end="</u>">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-underline">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M7 5v5a5 5 0 0 0 10 0v-5" />
                <path d="M5 19h14" />
              </svg>
        </button>
        <button class="btn btn-primary bbcode-button" data-start="<h1>" data-end="</h1>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-h-1">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M19 18v-8l-2 2" />
            <path d="M4 6v12" />
            <path d="M12 6v12" />
            <path d="M11 18h2" />
            <path d="M3 18h2" />
            <path d="M4 12h8" />
            <path d="M3 6h2" />
            <path d="M11 6h2" />
          </svg>
        </button>
        <button class="btn btn-primary bbcode-button" data-start="<h2>" data-end="</h2>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-h-2">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M17 12a2 2 0 1 1 4 0c0 .591 -.417 1.318 -.816 1.858l-3.184 4.143l4 0" />
            <path d="M4 6v12" />
            <path d="M12 6v12" />
            <path d="M11 18h2" />
            <path d="M3 18h2" />
            <path d="M4 12h8" />
            <path d="M3 6h2" />
            <path d="M11 6h2" />
          </svg>
        </button>
        <button class="btn btn-primary bbcode-button" data-start="<h3 class='section_title'>" data-end="</h3>">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-h-3">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M19 14a2 2 0 1 0 -2 -2" />
            <path d="M17 16a2 2 0 1 0 2 -2" />
            <path d="M4 6v12" />
            <path d="M12 6v12" />
            <path d="M11 18h2" />
            <path d="M3 18h2" />
            <path d="M4 12h8" />
            <path d="M3 6h2" />
            <path d="M11 6h2" />
          </svg>
        </button>
        <button class="btn btn-primary bbcode-button" data-start="<p class='section_paragraph'>" data-end="</p>">

            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-pilcrow">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M13 4v16" />
                <path d="M17 4v16" />
                <path d="M19 4h-9.5a4.5 4.5 0 0 0 0 9h3.5" />
              </svg>
            </button>
    </div>
    <textarea class="mt-4 form-control" rows="30" id="withBB" name="contacts_static_text">{{ $staticText }}</textarea>
    <button class="btn btn-success my-3" type="submit">Обновить текст</button>
</form>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('.bbcode-button');
    buttons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var startTag = button.getAttribute('data-start');
            var endTag = button.getAttribute('data-end');
            insertBBCode(startTag, endTag);
        });
    });

    function insertBBCode(startTag, endTag) {
        var textarea = document.getElementById('withBB');
        var start = textarea.selectionStart;
        var end = textarea.selectionEnd;
        var selectedText = textarea.value.substring(start, end);
        var replacement = startTag + selectedText + endTag;
        textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
    }
});
</script>

@endsection
