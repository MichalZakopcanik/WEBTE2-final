@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('trans.Dashboard')}}</div>

                    <div class="card-body">
                        {{__('trans.TeacherInstructions')}}
                    </div>
                    <button id="downloadBtn">{{__('trans.Download')}}</button>

                   
                </div>
            </div>
        </div>

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


    <table class="table table-bordered" id="teachersTable">

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
@section('scripts')
<script>
                        document.getElementById('downloadBtn').addEventListener('click', function() {
                            var content = document.querySelector('.card-body').textContent;
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', '{{ route('download.pdf') }}?content=' + encodeURIComponent(content), true);
                            xhr.responseType = 'blob';

                            xhr.onload = function(e) {
                                if (this.status === 200) {
                                    var blob = new Blob([this.response], { type: 'application/pdf' });
                                    var downloadUrl = URL.createObjectURL(blob);
                                    var a = document.createElement("a");
                                    a.href = downloadUrl;
                                    a.download = 'content.pdf';
                                    document.body.appendChild(a);
                                    a.click();
                                }
                            };

            xhr.send();
        });

        function convertToCSV(table) {
            var csv = [];
            var rows = table.getElementsByTagName('tr');

            for (var i = 0; i < rows.length; i++) {
                var row = [];
                var cells = rows[i].querySelectorAll('th, td');

                for (var j = 0; j < cells.length; j++) {
                    row.push(cells[j].innerText);
                }
                csv.push(row.join(','));
            }
            return csv.join('\n');
        }

        document.getElementById('downloadCSV').addEventListener('click', function () {
            var table = document.getElementById('teachersTable');
            var csvData = convertToCSV(table);

            // Create a temporary element for the download
            var downloadLink = document.createElement('a');
            downloadLink.href = 'data:text/csv;charset=utf-8,' + encodeURI(csvData);
            downloadLink.download = 'CSV.csv';

            // Simulate a click on the download link to trigger the download
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        });
    </script>
@endsection