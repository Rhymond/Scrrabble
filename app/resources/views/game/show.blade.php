@extends('layouts.app')

@section('content')
    <div class="row">
        @include('utils.sidebar')
        <div class="col-md-9">

            <div class="row">
                <div class="col-6">
                    <h4>{{ $game->first_name }} {{ $game->surname  }}</h4>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ url('/game') }}" class="btn btn-warning btn-sm" title="Back">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                    </a>
                    <a href="{{ url('/game/' . $game->id . '/edit') }}" class="btn btn-primary btn-sm"
                       title="Edit game">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                    </a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'url' => ['game', $game->id],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-sm',
                            'title' => 'Delete game',
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
                            <th>Winner</th>
                            <td>{{ $game->winner->name }}</td>
                        </tr>
                        <tr>
                            <th>Looser</th>
                            <td>{{ $game->looser->name }}</td>
                        </tr>
                        <tr>
                            <th>Winner Score</th>
                            <td>{{ $game->winnerScore }}</td>
                        </tr>
                        <tr>
                            <th>Opponent Score</th>
                            <td>{{ $game->looserScore }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
