@extends('layouts.app')


@section('content')

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Assignments Management</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-success" href="{{ route('assignments.create') }}"> Create New Assignment</a>

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

   <th>{{__("Id")}}</th>
   <th>{{__("From")}}</th>

   <th>{{__("To")}}</th>

   <th>{{__("Max points")}}</th>

   <th>{{__("Files used")}}</th>
  <th>{{__("Created by")}}</th>

   <th width="280px">Action</th>

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

       <a class="btn btn-info" href="{{ route('assignments.show',$assignment->id) }}">Show</a>

       <a class="btn btn-primary" href="{{ route('assignments.edit',$assignment->id) }}">Edit</a>

        {!! Form::open(['method' => 'DELETE','route' => ['assignments.destroy', $assignment->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

    </td>

  </tr>

 @endforeach

</table>


{!! $data->render() !!}



@endsection