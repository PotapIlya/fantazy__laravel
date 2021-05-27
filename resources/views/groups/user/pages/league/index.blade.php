@extends('groups.user.layouts.app')


@section('content')
    <section>
        <div class="container">

            <h1>
                Лиги
            </h1>


        <div class="d-flex justify-content-between">
            <div class="col-6">
                <h3>
                    Создать лигу
                </h3>
                <form method="POST" action="{{ route('user.league.store') }}" class="d-flex flex-column">
                    @csrf
                    <label for="">
                        <input type="text" required name="name" placeholder="name">
                    </label>
                    <label for="">
                        <input type="text" name="password" placeholder="password">
                    </label>

                    <button class="btn btn-info">Create</button>
                </form>
            </div>

            <div class="col-6">
                <div>
                    <h2>Вы присоеденились</h2>
                    @if(count($userLeagues))
                        <ul>
                            @foreach($userLeagues as $userLeague)
                                <li class="d-flex">
                                    <a href="{{ route('user.league.show', $userLeague->id) }}">
                                        {{ $userLeague->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h3>Пусто</h3>
                    @endif
                </div>
                <div>
                    <h2>
                        Все лиги
                    </h2>
                    @if(count($leagues))
                        <ul>
                            @foreach( $leagues as $league )
                                <li class="d-flex align-items-center justify-content-between">
                                    <a href="{{ route('user.league.show', $league->id) }}">
                                        {{ $league->name }}
                                    </a>

                                    @if( !is_null($league->password) )
                                        <form action="{{ route('user.league.addUser', $league->id) }}" method="POST">
                                            @csrf
                                            <label for="">
                                                <input type="text" name="password" required>
                                            </label>
                                            <button class="btn btn-info">Войти</button>
                                        </form>
                                    @else
                                        <form action="{{ route('user.league.addUser', $league->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-info">Войти</button>
                                        </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h3>Пусто</h3>
                    @endif
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
