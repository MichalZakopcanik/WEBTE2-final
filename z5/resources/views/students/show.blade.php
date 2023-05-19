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

            <h2>{{__('trans.Assignments Management')}}</h2>

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
  <th>{{__('trans.Submitted')}}</th>

   <th width="280px">{{__('trans.Action')}}</th>

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
       <a class="btn btn-info" href="{{ route('students.generate',$assignment->id) }}">{{__('trans.Generate')}}</a>       
    </td>

  </tr>
  @endforeach
  @endif
</table>


{{ $assignments->links() }}



@endsection
