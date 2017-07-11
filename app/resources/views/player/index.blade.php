@extends('layouts.app')

@section('content')

    <div class="row mt-3">
        @include('utils.sidebar')
        <div class="col-9">

            <div class="row">
                <div class="col-6">
                    <h4>Players</h4>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ url('/player/create') }}" class="btn btn-success btn-sm" title="Add New player">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($player as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td class="text-right">
                                    <a href="{{ url('/player/' . $item->id) }}" class="btn btn-info btn-sm" title="View player">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </a>
                                    <a href="{{ url('/player/' . $item->id . '/edit') }}"  class="btn btn-primary btn-sm" title="Edit player">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                                    </a>
                                    {!! Form::open([
                                        'method'=>'DELETE',
                                        'url' => ['/player', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-sm',
                                            'title' => 'Delete player',
                                            'onclick'=>'return confirm("Confirm delete?")'
                                    )) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="pagination-wrapper"> {!! $player->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
@endsection
