@extends('groups.user.layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>Myteam</h1>

            <h2>
                Ваша команда
            </h2>

            @if(count($user->players))
                <ul class="w-50">
                    @foreach($user->players as $player)
                        <li class="d-flex justify-content-between align-content-center">
                            Player: {{ $player->name }} =>
                            Team: {{ $player->team->name }} =>
                            Role: {{ $player->role->name }}
                            <form action="{{ route('user.myTeam.destroyPlayer', $player->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Delete</button>
                            </form>
                            <br>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if(count($players))
                <h4>
                    Добавить игрока в вашу команду
                </h4>
                <form action="{{ route('user.myTeam.addPlayer') }}" method="POST">
                    @csrf
                        <select name="player_id" id="">
                            @foreach($players as $player)
                                <option value="{{ $player->id }}">
                                   team: {{ $player->team->name }} - name: {{ $player->name }} - role: {{ $player->role->name }}
                                </option>
                            @endforeach
                        </select>
                    <button class="btn btn-success">Save</button>
                </form>
            @else
                <h2>Нету игроков</h2>
            @endif




        </div>
    </section>
@endsection
