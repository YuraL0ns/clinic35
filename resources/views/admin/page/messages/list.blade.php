@extends('adminlte::page')

@section('title', 'Submissions')

@section('content_header')
    <h1>Submissions</h1>
@stop

@section('content')
    <div class="row">
        @php
            $groups = ['header' => [], 'Из подвала сайта' => [], 'Отдельная страница' => []];
            foreach ($submissions as $submission) {
                $groups[$submission->from][] = $submission;
            }
        @endphp

        @foreach ($groups as $type => $groupSubmissions)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ ucfirst($type) }} </h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Имя</th>
                                <th>Телефон</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($groupSubmissions as $submission)
                                <tr>
                                    <td>{{ $submission->name }}</td>
                                    <td><a href="tel:{{ $submission->phone }}">{{ $submission->phone }}</a></td>
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