@extends('layouts.main')

@section('content')

    <h1>{{ $user->name }}</h1>

    <h3>Posts</h3>

    @if($ccd_car_shops->isEmpty())
        Postov net
    @else

        <ul>
            @foreach($ccd_car_shops as $ccd_car_shop)
                <li>
                    <a href="{{ route('ccd_car_shops.show',$ccd_car_shop) }}">
                        {{ $ccd_car_shop->carName }}
                    </a>
                </li>
            @endforeach
        </ul>

    @endif

    <hr>

    <h3>Comments</h3>

    @forelse($comments as $comment)
        <p>
            {{ $comment->content }}
            <br>
            <small>
                <a href="{{ route('ccd_car_shops.show', $comment->ccd_car_shop) }}">
                    {{ $comment->ccd_car_shop->carName }}
                </a>
            </small>
        </p>
    @empty
        Comments not!
    @endforelse
@endsection
