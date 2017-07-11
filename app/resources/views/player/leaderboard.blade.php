@extends('layouts.app')

@section('content')

    <div class="row mt-3">
        @include('utils.sidebar')
        <div class="col-9">

            <div class="row">
                <div class="col-6">
                    <h4>Leaderboard</h4>
                </div>
            </div>

            @if ($players)
                <div class="row mt-3">
                    <div class="col-12">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Avarage score</th>
                                <th>Games</th>
                                <th>Wins</th>
                                <th>Looses</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($players as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->avarageScore }}</td>
                                    <td>{{ $item->played }}</td>
                                    <td>{{ $item->won }}</td>
                                    <td>{{ $item->lost }}</td>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
