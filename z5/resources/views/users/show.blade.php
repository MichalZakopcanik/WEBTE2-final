
@extends('layouts.app')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>{{__('trans.Show User')}}</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-primary" href="{{ route('users.index') }}"> {{__('trans.Back')}}</a>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>{{__('trans.Name')}}:</strong>

            {{ $user->name }}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>{{__('trans.email')}}:</strong>

            {{ $user->email }}

        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">

            <strong>{{__('trans.Roles')}}:</strong>

            @if(!empty($user->getRoleNames()))

                @foreach($user->getRoleNames() as $v)

                    <label class="badge badge-success">{{ $v }}</label>

                @endforeach

            @endif

        </div>

    </div>

</div>

@endsection
