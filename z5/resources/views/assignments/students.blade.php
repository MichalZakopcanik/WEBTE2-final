@extends('layouts.app')


@section('content')
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>{{__('trans.studentP')}}</h2>

        </div>

    </div>

</div>


@if ($message = Session::get('success'))

<div class="alert alert-success">

  <p>{{ $message }}</p>

</div>

@endif


<table class="table table-bordered" id="studentsTable">

 <tr>

   <th>{{__('trans.Name')}}</th>

   <th>{{__('trans.email')}}</th>

   <th>{{__('trans.Roles')}}</th>

   <th width="280px">{{__('trans.Action')}}</th>

 </tr>

 @foreach ($data as $key => $user)
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

  </tr>

 @endforeach

</table>


{!! $data->render() !!}


<button id="downloadCSV">Export CSV</button>

{!! $data->render() !!}



@endsection
@section('scripts')
<script>
                        function convertToCSV(table) {
                            var csv = [];
                            var rows = table.getElementsByTagName('tr');
                            for (var i = 0; i < rows.length; i++) {
                                var row = [];
                                var cells = rows[i].querySelectorAll('th, td');
                                for (var j = 0; j < cells.length - 1; j++) {
                                    row.push(cells[j].innerText);
                                }
                                csv.push(row.join(','));
                            }
                            return csv.join('\n');
                        }
                        document.getElementById('downloadCSV').addEventListener('click', function () {
                            var table = document.getElementById('studentsTable');
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
