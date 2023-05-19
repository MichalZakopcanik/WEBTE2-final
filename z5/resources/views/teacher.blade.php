@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('trans.Dashboard')}}</div>

                    <div class="card-body">
                        {{__('trans.TeacherInstructions')}}
                    </div>
                    <button id="downloadBtn">{{__('trans.Download')}}</button>

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
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
