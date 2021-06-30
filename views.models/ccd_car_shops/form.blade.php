<?php
$ccd_car_shop = $ccd_car_shop ?? null;
?>

<h1> @if($ccd_car_shop) Редактировать запись @else Новая запись @endif</h1>
<a href="{{ route('ccd_car_shops.index') }}">Все авто</a>

<form action="{{ $ccd_car_shop ? route('ccd_car_shops.update', $ccd_car_shop) : route('ccd_car_shops.store')}}" method="post">
    @csrf

    @if($ccd_car_shop)
        @method('put')
    @endif

    <div>
        <label for="carName">🚙 Модель:</label>
    </div>
    <div>
        <input value="{{ old('carName', $ccd_car_shop->carName ?? null) }}" type="text" name="carName" required autofocus />
        @error('carName')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="price">💳 Цена:</label>
    </div>
    <div>
        <input value="{{ old('price', $ccd_car_shop->price ?? null) }}" type="text" name="price" required autofocus />
        @error('price')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="tax">💰 Налог:</label>
    </div>
    <div>
        <input value="{{ old('tax', $ccd_car_shop->tax ?? null) }}" type="text" name="tax" required autofocus />
        @error('tax')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="maxSpeed">⚙ Макс.скорость:</label>
    </div>
    <div>
        <input value="{{ old('maxSpeed', $ccd_car_shop->maxSpeed ?? null) }}" type="text" name="maxSpeed" required autofocus />
        @error('maxSpeed')
        <span>{{ $message }}</span>
        @enderror
    </div>

    <button>@if($ccd_car_shop) Редактировать @else Создать @endif</button>
</form>
