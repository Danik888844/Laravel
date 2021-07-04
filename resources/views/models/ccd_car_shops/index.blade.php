@extends('layouts.main')

@section('content')
<h1>Записи</h1>

@can('create', App\Models\ccdCarShop::class)
    <a href="{{route('ccd_car_shops.create')}}">Добавить запись</a>
@endcan

<hr>

@if($ccd_car_shops->isNotEmpty())
    <ol>
        @foreach($ccd_car_shops as $post)
            <li value="{{$post->id}}">
                <a href="{{ route('ccd_car_shops.show', $post) }}">
                    {{$post->carName}}
                </a>,
                <small>
                    <a href="{{ route('users.show',$post->user) }}">
                        {{ $post->user->name }}
                    </a>
                </small>
            </li>
        @endforeach
    </ol>

@else

    <div>
        Posts is not allowed
    </div>
@endif
@endsection
