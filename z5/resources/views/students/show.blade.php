@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Assignments Management</h2>

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
  <th>{{__("Submitted")}}</th>

   <th width="280px">Action</th>

 </tr>
 
 @if ($assignments->count() > 0)
 @foreach ($assignments as $assignment)
  <tr>

    <td>{{ $assignment->id }}</td>

    <td>{{ $assignment->from_time }}</td>

    <td>{{ $assignment->to_time }}</td>

    <td>
{{ $assignment->max_points }}
      
    </td>
 <td>
{{ $assignment->getAttribute('fileList') }}
      
    </td> <td>
{{ $assignment->owner->name }}
      
    </td>
    <td>
    </td> 
    <td>          
       <a class="btn btn-info" href="{{ route('students.generate',$assignment->id) }}">Generate</a>

       <a class="btn btn-primary" href="{{ route('assignments.edit',$assignment->id) }}">Edit</a>
       
    </td>

  </tr>
  @endforeach
  @endif
</table>


{{ $assignments->links() }}



@endsection