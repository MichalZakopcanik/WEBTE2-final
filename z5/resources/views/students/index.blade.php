@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('trans.Dashboard')}}</div>

                <div class="card-body">
                    {{__('trans.StudentInstructions')}}
                </div>
                <button id="downloadBtn">{{__('trans.Download')}}</button>

               
            </div>
        </div>
    </div>
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>{{__('trans.studentP')}}</h2>

        </div>

        <div class="pull-right">

            <a class="btn btn-success" href="{{ route('users.create') }}">{{__('trans.CNUser')}}</a>

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

   <th>{{__('trans.Name')}}</th>

   <th>{{__('trans.email')}}</th>

   <th>{{__('trans.Roles')}}</th>

   <th width="280px">{{__('trans.Action')}}</th>

 </tr>

 @foreach ($data as $key => $user)
 @if ($user->id == Auth::id())
  <tr>

    <td>{{ $user->name }}</td>

    <td>{{ $user->email }}</td>

    <td>

      @if(!empty($user->getRoleNames()))

        @foreach($user->getRoleNames() as $v)

           <label class="badge badge-success">{{ $v }}</label>

        @endforeach

      @endif

    </td>

    <td>

       <a class="btn btn-primary" href="{{ route('students.show',$user->id) }}">Assignments</a>
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">{{__('trans.Show')}}</a>

    </td>

  </tr>
  @endif

 @endforeach

</table>


{!! $data->render() !!}


@endsection

@section('scripts')
<script>
                    document.getElementById('downloadBtn').addEventListener('click', function() {
                        var content = document.querySelector('.card-body').textContent;
                        if(content){
                          var xhr = new XMLHttpRequest();
                        xhr.open('GET', '{{ route('download.pdf') }}?content=' + encodeURIComponent(content), true);
                        xhr.responseType = 'blob';

                        xhr.onload = function(e) {
                            if (this.status === 200) {
                                var blob = new Blob([this.response], { type: 'application/pdf' });
                                var downloadUrl = URL.createObjectURL(blob);
                                var a = document.createElement("a");
                                a.href = downloadUrl;
                                a.download = 'PDF.pdf';
                                document.body.appendChild(a);
                                a.click();
                            }
                        };

                        xhr.send();
                        }
                        
                    });
                </script>
@endsection
