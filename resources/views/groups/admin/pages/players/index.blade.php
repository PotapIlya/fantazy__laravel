@extends('groups.admin.layouts.app')

@section('content')
    <section>
        <div class="container">

            <form action="{{ route('admin.players.store') }}" method="POST">
                @csrf
                @if(count($teams))
                    <select name="team_id" id="">
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">
                                {{ $team->name }}
                            </option>
                        @endforeach
                    </select>
                @endif
                <label for="">
                    <input type="text" name="name" placeholder="NameTeam">
                </label>
                <button type="submit" class="btn btn-success">Save</button>
            </form>


            @if(count($players))
                <ul>
                    @foreach($players as $player)
                        <li>
                            {{ $player->team->name }} - {{ $player->name }}
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </section>
@endsection