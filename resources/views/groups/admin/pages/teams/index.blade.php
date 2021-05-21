@extends('groups.admin.layouts.app')

@section('content')
    <section>
        <div class="container">

            <form action="{{ route('admin.teams.store') }}" method="POST">
                @csrf
                <label for="">
                    <input type="text" name="name" placeholder="NameTeam">
                </label>
                <button type="submit" class="btn btn-success">Save</button>
            </form>


            @if(count($teams))
              <ul>
                  @foreach($teams as $team)
                      <li>{{ $team->name }}</li>
                  @endforeach
              </ul>
            @endif

        </div>
    </section>
@endsection