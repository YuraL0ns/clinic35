@section('js')
    <script>
        function formatText(command) {
            event.preventDefault()
            let textArea = document.getElementById("doctor_students");
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
                    textArea.value = beforeText + '<ul class="doctor_page_view-box-item-box-desc-text-list">' + listItems + '</ul>' + afterText;
                    break;
                case 'itemList':
                    textArea.value = beforeText + '<li>' + selectedText + '</li>' + afterText;
                    break;
                case 'br':
                    textArea.value = beforeText + selectedText + '<br>' + afterText;
                    break;
                default:
                    console.log('Unknown command.');
            }
        }
    </script>
@endsection
<div class="bb mb-2">
    <button class="btn btn-xs btn-primary" title="Текст Жирный" onclick="formatText('bold', event)"><i class="fas fa-bold"></i></button>
    <button class="btn btn-xs btn-primary" title="Текст Курсив" onclick="formatText('italic', event)"><i class="fas fa-signature"></i></button>
    <button class="btn btn-xs btn-primary" title="Текст Подчеркнутый" onclick="formatText('underline', event)"><i class="fas fa-underline"></i></button>
    <button class="btn btn-xs btn-primary" title="Список из элементов" onclick="formatText('list', event)"><i class="fas fa-list"></i></button>
    <button class="btn btn-xs btn-primary" title="Елемент списка" onclick="formatText('itemList', event)"><i class="fas fa-circle"></i></button>
    <button class="btn btn-xs btn-primary" title="Новая строка" onclick="formatText('br', event)"><i class="fas fa-arrow-down"></i></button>
</div>
