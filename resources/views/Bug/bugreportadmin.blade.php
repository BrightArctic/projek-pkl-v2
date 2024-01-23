@extends('layouts.app')

@section('title', 'Default Layout')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Bug Reports</h1>
            </div>
            <div class="section-body">
                @foreach($bugReports as $bugReport)
                <div class="card" id="bugReport_{{ $bugReport->id }}">
                    <div class="card-body d-flex align-items-center">
                        {{-- profile pic --}}
                        <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-3 mb-2" style="width: 40px; height: 40px;">
                        {{-- end of profile pic --}}
                        <div class="media-body">
                            <div class="media-title"><strong>Nama: {{ $bugReport->name }}</strong></div>
                            <p class="mb-1">Subject: {{ $bugReport->subject }}</p>
                            <p class="mb-1">Message: {{ $bugReport->message }}</p>
                            {{-- Display the image below the message --}}
                            @if($bugReport->image_path)
                            <li class="media">
                                {{-- Use the hashed image path when displaying the image --}}
                                <img src="{{ asset($bugReport->image_path) }}" alt="bug image" class="img-fluid rounded">
                            </li>
                            @endif

                            <div class="time"><strong>10 Hours Ago</strong></div>
                        </div>

                        {{-- Button on the right side --}}
                        <div class="ml-auto">
                            <button class="btn btn-primary" onclick="deleteBugReport({{ $bugReport->id }})">tag as fixed</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

    <script>
        function deleteBugReport(bugReportId) {
            if (confirm("Are you sure you want to delete this bug report?")) {
                $.ajax({
    type: 'DELETE',
    url: '/bugreport/delete/' + bugReportId,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function () {
        // Remove the card from the view
        $('#bugReport_' + bugReportId).remove();
        alert('Bug report deleted successfully!');
    },
    error: function () {
        alert('Failed to delete bug report. Please try again.');
    }
});
            }
        }
    </script>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush
