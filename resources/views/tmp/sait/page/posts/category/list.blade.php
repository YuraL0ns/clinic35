@extends('tmp.main.default')
@section('content')
   <ul>
     {{-- Получаем список категорий (всех) --}}
     @foreach ($categories as $c )
     <li>
         <a href="{{route('sait.category.list.show', $c->cat_alias)}}">{{$c->cat_title}}</a>
     </li>
 @endforeach
   </ul>

@endsection