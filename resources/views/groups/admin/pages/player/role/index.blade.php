@extends('groups.admin.layouts.app')

@section('content')
    <section>
        <div class="container">

            <form action="{{ route('admin.player.role.store') }}" method="POST">
                @csrf
                <label for="">
                    <input required type="text" name="name" placeholder="NameTeam">
                </label>
                <button type="submit" class="btn btn-success">Save</button>
            </form>


            @if(count($roles))
                <ul>
                    @foreach($roles as $role)
                        <li>
                            {{ $role->name }}
                        </li>
                    @endforeach
                </ul>
            @endif

        </div>
    </section>
@endsection
