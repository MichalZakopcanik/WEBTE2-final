@extends('layouts.app')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>{{ __('Create New Assgnment') }}</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('assignments.index') }}"> Back</a>

            </div>

        </div>

    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
    @endif



    {!! Form::open(['route' => 'assignments.store', 'method' => 'POST']) !!}

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>{{__("Date from:")}}</strong>
                    <div class='input-group date' id='dtp_from'>
                        <input type='text' class="form-control" name="from_time"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>{{__("Date to:")}}</strong>
                     <div class='input-group date' id='dtp_to'>
                        <input type='text' class="form-control" name="to_time"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Max points:</strong>

                {!! Form::number('max_points', 0,['placeholder' => 'Maximum points', 'class' => 'form-control']) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>LaTex files:</strong>
<select name="tex_files[]" class="form-control" multiple>
    @foreach ($files as $file )
        <option value="{{$file}}">{{$file}}</option>
    @endforeach
  </select>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Students:</strong>

                {!! Form::select('students[]', $students, [], ['class' => 'form-control', 'multiple']) !!}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

    {!! Form::close() !!}


@endsection
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

@endsection
@section("scripts")
            <script type="text/javascript">
$(document).ready(function(){
 $('#dtp_from').datetimepicker();
 $('#dtp_to').datetimepicker();
});
                </script>

@endsection