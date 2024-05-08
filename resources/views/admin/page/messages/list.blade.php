@extends('adminlte::page')

@section('title', 'Форма обратной связи')

@section('content_header')
    <h1>Обратная связь</h1>
@stop

@section('content')
<div class="row my-2">
    <input class="btn btn-xs btn-primary" value="Обновить данные" onclick="document.location.reload(true)" />
</div>
    <div class="row">
        
        @php
        use Carbon\Carbon;
            $groups = ['header' => [], 'footer' => [], 'page_vacancy' => []];
            foreach ($submissions as $submission) {
                $groups[$submission->from][] = $submission;
            }
        @endphp

            

        @foreach ($groups as $type => $groupSubmissions)
            <div class="col-md-4 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ ucfirst($type) }} </h3>
                    </div>
                    <div class="card-body p-0">
                        <table id="headerTable" class="table table-striped ">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Дата</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($groupSubmissions as $submission)
                                <tr >
                                    <td>{{ $submission->name }}</td>
                                    <td><a href="tel:{{ $submission->phone }}">{{ $submission->phone }}</a></td>
                                    <td>{{Carbon::parse($submission->created_at)->format('d F Y г H:i')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('myJs')
<script>
    setTimeout(() => {
    location.reload()
}, 80000);
</script>

@stop
