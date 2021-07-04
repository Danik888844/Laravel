@extends('layouts.main')

@section('content')
    <h1>{{ $ccd_car_shop->carName }}</h1>
    <a href="{{ route('ccd_car_shops.index') }}">All posts</a>

    <hr>
    <div>
        <div>
            <small>
                <b>Created:</b> {{ $ccd_car_shop->created_at }}
            </small>
        </div>
        <div>
            <small>
                <b>Author:</b> <a href="{{ route('users.show',$ccd_car_shop->user) }}">{{ $ccd_car_shop->user->name }}</a>
            </small>
        </div>
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

    @can('update',$ccd_car_shop)
        <a href="{{ route('ccd_car_shops.edit', $ccd_car_shop) }}">Edit</a>
    @endcan

    @can('delete',$ccd_car_shop)
        <form action="{{ route('ccd_car_shops.destroy', $ccd_car_shop) }}" method="post">
            @csrf @method('delete')
            <button>Delete</button>
        </form>
    @endcan

    <hr>

    <h3>Comments:</h3>
    @can('create',\App\Models\Comment::class)
        <form action="{{ route('comments.store', $ccd_car_shop) }}" method="post">
            @csrf

            <textarea name="content">{{ old('content') }}</textarea>
            @error('content')
            <span>{{ $message }}</span>
            @enderror

            <div>
                <button>Add comment</button>
            </div>
        </form>
    @endcan

    @forelse($ccd_car_shop->comments as $comment)
        <p>
            <small>
                <span>
                    @if($comment->user)
                        <a href="{{ route('users.show',$comment->user) }}">
                        {{ $comment->user->name }}
                        </a>
                    @else
                        DELETED
                    @endif
                </span>

                @can('delete',$comment)
                    <a href="#" class="delete-comment-link" data-form-id="delete-comment-{{$comment->id}}">
                        Delete</a>
                @endcan
            </small>
            <br>
            <span>
            {{ $comment->content }}
        </span>
        </p>

        @can('delete',$comment)
            <form id="delete-comment-{{ $comment->id }}" action="{{ route('comments.destroy',$comment) }}" method="post">
                @csrf @method('delete')
            </form>
        @endcan

    @empty
        <div>
            Комментариев пока нет!
        </div>
    @endforelse

    <script>
        let links = document.querySelectorAll('.delete-comment-link');

        links.forEach((link) => {
            link.addEventListener('click', (event)=>{
                event.preventDefault();
                let id = link.dataset.formId;

                if(id){
                    let form = document.getElementById(id);

                    if(form)
                        form.submit();
                }
            });
        });
    </script>
@endsection
