@extends('layouts.app')

@section('content')
    <div class="row">
        @include('utils.sidebar')
        <div class="col-md-9">

            <div class="row">
                <div class="col-6">
                    <h4>{{ $player->first_name }} {{ $player->surname  }}</h4>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ url('/player') }}" class="btn btn-warning btn-sm" title="Back">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                    </a>
                    <a href="{{ url('/player/' . $player->id . '/edit') }}" class="btn btn-primary btn-sm"
                       title="Edit player">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                    </a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['player', $player->id],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete player',
                            'onclick'=>'return confirm("Confirm delete?")'
                    ))!!}
                    {!! Form::close() !!}
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <table class="table table-sm">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $player->id }}</td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>{{ $player->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Surname</th>
                            <td>{{ $player->surname }}</td>
                        </tr>
                        <tr>
                            <th>Club</th>
                            <td>{{ $player->club }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $player->email }}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>{{ $player->contact_number }}</td>
                        </tr>
                        <tr>
                            <th>Games played</th>
                            <td>{{ $player->played }}</td>
                        </tr>
                        <tr>
                            <th>Games won</th>
                            <td>{{ $player->won }}</td>
                        </tr>
                        <tr>
                            <th>Games lost</th>
                            <td>{{ $player->lost }}</td>
                        </tr>
                        <tr>
                            <th>Avarage Score</th>
                            <td>{{ $player->avarageScore }}</td>
                        </tr>
                        <tr>
                            <th>Best Score</th>
                            <td>{{ $player->bestScore }}</td>
                        </tr>
                        <tr>
                            <th></th>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($player->hasGames)
                <div class="row mt-3">
                    <div class="col-12">
                        <h4>Best Score Game</h4>
                    </div>
                    <div class="col-12 mt-3">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Winner</th>
                                <th>Looser</th>
                                <th>Winner Score</th>
                                <th>Losser Score</th>
                                <th>Played at</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{ $player->bestGame->winner->name }}</td>
                                <td>{{ $player->bestGame->looser->name }}</td>
                                <td>{{ $player->bestGame->winnerScore }}</td>
                                <td>{{ $player->bestGame->looserScore }}</td>
                                <td>{{ $player->bestGame->created_at }}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                @if ($player->winner)
                <div class="row mt-3">
                    <div class="col-12">
                        <h4>Games as Winner</h4>
                    </div>
                    <div class="col-12 mt-3">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Winner</th>
                                <th>Looser</th>
                                <th>Winner Score</th>
                                <th>Losser Score</th>
                                <th>Played at</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if ($player->winner)
                                @foreach ($player->winner as $game)
                                    <tr>
                                        <td>{{ $game->winner->name }}</td>
                                        <td>{{ $game->looser->name }}</td>
                                        <td>{{ $game->winnerScore }}</td>
                                        <td>{{ $game->looserScore }}</td>
                                        <td>{{ $game->created_at }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                @if ($player->looser)
                <div class="row mt-3">
                    <div class="col-12">
                        <h4>Games as Looser</h4>
                    </div>
                    <div class="col-12 mt-3">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Winner</th>
                                <th>Looser</th>
                                <th>Winner Score</th>
                                <th>Losser Score</th>
                                <th>Played at</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach ($player->looser as $game)
                                    <tr>
                                        <td>{{ $game->winner->name }}</td>
                                        <td>{{ $game->looser->name }}</td>
                                        <td>{{ $game->winnerScore }}</td>
                                        <td>{{ $game->looserScore }}</td>
                                        <td>{{ $game->created_at }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
            @endif

        </div>
    </div>
@endsection
