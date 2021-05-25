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
                        <input type="text" required name="name">
                    </label>
                    <label for="">
                        <input type="text" name="password">
                    </label>

                    <button class="btn btn-info">Create</button>
                </form>
            </div>

            <div class="col-6">
                <h2>
                    Мои лиги
                </h2>

                @if(count($user->league))
                    <ul>
                        @foreach( $user->league as $league )
                            <li class="d-flex align-items-center justify-content-between">
                                <span>
                                    {{ $league->name }}
                                </span>

                                @if( is_null($league->password) )
                                    <form action="" method="POST">
                                        @csrf
                                        <input type="text" name="password" required>
                                        <button class="btn btn-info">Войти</button>
                                    </form>
                                @else
                                    <a href="#" class="btn btn-info ">Войти</a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <h3>
                        Empty
                    </h3>
                @endif


            </div>
        </div>

        </div>
    </section>
@endsection
