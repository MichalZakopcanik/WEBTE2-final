@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('trans.VerifyEmail')}}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{__('trans.NewEmailVerLink')}}
                        </div>
                    @endif

                        {{__('trans.VerLinkCheck')}}.
                        {{__('trans.NoMail')}},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{__('trans.ClickReq')}}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
