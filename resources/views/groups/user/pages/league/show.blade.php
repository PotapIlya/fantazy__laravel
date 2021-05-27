@extends('groups.user.layouts.app')


@section('content')
    <section>
        <div class="container">


            @if(count($item->users))
                <h3>Встапили в лигу</h3>
                <ul>
                    @foreach($item->users as $user)
                        <li>
                            <a href="{{ route('user.myTeam.show', $user->id) }}" class="d-flex">
                                {{ $user->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <h2>Еще никто не вступл в лигу</h2>
            @endif

            @if($statusComeForm)
                @if( !is_null($item->password) )
                    <form action="{{ route('user.league.addUser', $item->id) }}" method="POST">
                        @csrf
                        <input type="text" name="password" required>
                        <button class="btn btn-info">Войти</button>
                    </form>
                @else
                    <form action="{{ route('user.league.addUser', $item->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-info">Войти</button>
                    </form>
                @endif
            @else
                <form action="{{ route('user.league.destroyUser', $id) }}" method="post">
                    @csrf
                    <button class="btn btn-danger h2">Покинуть</button>
                </form>
            @endif

            @if($statusDestroyForm)
                <form action="{{ route('user.league.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger h2">Удалить</button>
                </form>
            @endif

        </div>
    </section>
@endsection
