@extends('groups.admin.layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>Myteam</h1>



            <h2>
                Ваша команда
            </h2>

            @if(count($user->players))
                <ul>
                    @foreach($user->players as $player)
                        Player: {{ $player->name }} =>
                        Team: {{ $player->team->name }}
                        <br>
                    @endforeach
                </ul>
            @endif

            <h4>
                Добавить игрока в вашу команду
            </h4>
            <form action="{{ route('user.myTeam.addPlayer') }}" method="POST">
                @csrf

                @if(count($players))
                    <select name="player_id" id="">
                        @foreach($players as $player)
                            <option value="{{ $player->id }}">
                                {{ $player->name }}
                            </option>
                        @endforeach
                    </select>
                @endif
                <button class="btn btn-success">Save</button>

            </form>




        </div>
    </section>
@endsection