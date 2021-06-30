<h1>🚙 {{ $ccd_car_shop->carName }}</h1>
<a href="{{ route('ccd_car_shops.index') }}">Все авто</a>

<hr>
<div>
    <small>
        <b>Создано:</b> {{ $ccd_car_shop->created_at }}
    </small>
</div>

<p>
    <b>💳 Цена:</b> {{ $ccd_car_shop->price }}
</p>

<p>
    <b>💰 Налог:</b> {{ $ccd_car_shop->tax }}
</p>

<p>
    <b>⚙ Макс.скорость:</b> {{ $ccd_car_shop->maxSpeed }} km/h
</p>


<a href="{{ route('ccd_car_shops.edit', $ccd_car_shop) }}">Редактировать</a>

<form action="{{ route('ccd_car_shops.destroy', $ccd_car_shop) }}" method="post">
    @csrf @method('delete')
    <button>Удалить</button>
</form>
