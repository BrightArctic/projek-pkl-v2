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

                                <div class="time"><strong>{{ $bugReport->created_at->diffForHumans() }}</strong></div>
                            </div>

                            {{-- Button on the right side --}}
                            <div class="ml-auto">
                                <button class="btn btn-primary" onclick="addToTodoList({{ $bugReport->id }}, '{{ $bugReport->name }}', '{{ $bugReport->subject }}', '{{ $bugReport->message }}')">Add to To-Do List</button>
                            </div>
                            <div class="ml-2">
                                <button class="btn btn-danger" onclick="deleteBugReport({{ $bugReport->id }})"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <script>
      function addToTodoList(bugReportId, name, subject, message) {
    // Make an AJAX request to send bug report information to the controller
    $.ajax({
        type: 'POST',
        url: '{{ route("todo-list.add") }}', // Route to the controller method
        data: {
            bugReportId: bugReportId,
            name: name,
            subject: subject,
            message: message,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            // Handle success response if needed
            console.log(response);
        },
        error: function(xhr, status, error) {
            // Handle error response if needed
            console.error(xhr.responseText);
        }
    });
}

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
