<h1>Записи</h1>
<a href="{{route('ccd_car_shops.create')}}">Добавить запись</a>

<hr>

@if($ccd_car_shops->isNotEmpty())
    <ol>
        @foreach($ccd_car_shops as $ccd_car_shop)
            <li value="{{$ccd_car_shop->id}}">
                <a href="{{ route('ccd_car_shops.show', $ccd_car_shop) }}">
                    {{$ccd_car_shop->carName}}
                </a>
            </li>
        @endforeach
    </ol>

@else

    <div>
        Ни одной записи не найдено...
    </div>
@endif
