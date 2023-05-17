@extends('layouts.app')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>{{__('trans.Assignments Management')}}</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-success" href="{{ route('assignments.create') }}"> {{__('trans.CNA')}}</a>

        </div>

    </div>

</div>


@if ($message = Session::get('success'))

<div class="alert alert-success">

  <p>{{ $message }}</p>

</div>

@endif


<table class="table table-bordered">

 <tr>

   <th>{{__('trans.Id')}}</th>
   <th>{{__('trans.From')}}</th>

   <th>{{__('trans.To')}}</th>

   <th>{{__('trans.Max points')}}</th>

   <th>{{__('trans.Files used')}}</th>
  <th>{{__('trans.Created by')}}</th>

   <th width="280px">{{__('Action')}}</th>

 </tr>

 @foreach ($data as $key => $assignment)

  <tr>

    <td>{{ $assignment->id }}</td>

    <td>{{ $assignment->from_time }}</td>

    <td>{{ $assignment->to_time }}</td>

    <td>
{{ $assignment->max_points }}
      
    </td>
 <td>
{{ $assignment->fileList }}
      
    </td> <td>
{{ $assignment->owner->name }}
      
    </td>
    <td>


       <a class="btn btn-primary" href="{{ route('assignments.edit',$assignment->id) }}">{{__('trans.Edit')}}</a>

        {!! Form::open(['method' => 'DELETE','route' => ['assignments.destroy', $assignment->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

    </td>

  </tr>

 @endforeach

</table>


{!! $data->render() !!}



@endsection