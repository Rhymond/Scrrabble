@extends('layouts.app')

@section('content')
    <div class="row">
        @include('utils.sidebar')
        <div class="col-md-9">

            <div class="row">
                <div class="col-6">
                    <h4>Create New player</h4>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ url('/player') }}" class="btn btn-warning btn-sm" title="Back">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                    </a>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    {!! Form::open(['url' => '/player', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include('player.form')

                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
@endsection
