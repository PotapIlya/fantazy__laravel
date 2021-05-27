@extends('groups.user.layouts.app')

@section('content')
    <section>
        <div class="container">


            <h2>
                Команда {{ $user->name }}
            </h2>

            @if(count($user->players))

                <ul>
                    @foreach($user->players as $player)
                        <li class="d-flex">
                            {{ $player->name }}
                        </li>
                    @endforeach
                </ul>

            @endif


        </div>
    </section>
@endsection
