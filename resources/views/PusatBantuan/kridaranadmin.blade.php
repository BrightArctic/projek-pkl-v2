@extends('layouts.app')

@section('title', 'Default Layout')

@push('style')
    <!-- CSS Libraries -->
    <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<style>
    /* Custom CSS to change text color of notifications */
    .toast-style {
        color: white !important; /* Set text color to white */
    }
</style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kridaran Admin</h1>
            </div>
            <div class="section-body">
                @if($kridaranData->isEmpty())
                    <!-- Display this card only when there are no Kridaran data -->
                    <div class="card">
                        <div class="card-body">
                            No Kridaran data found.
                        </div>
                    </div>
                @else
                    <!-- Display Kridaran data cards -->
                    @foreach($kridaranData as $kridaran)
                        <div class="card" id="kridaran_{{ $kridaran->id }}">
                            <div class="card-body d-flex align-items-center">
                                {{-- profile pic --}}
                                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-3 mb-2" style="width: 40px; height: 40px;">
                                {{-- end of profile pic --}}
                                <div class="media-body">
                                    <div class="media-title"><strong>Nama: {{ $kridaran->name }}</strong></div>
                                    <p class="mb-1">Message: {{ $kridaran->message }}</p>
                                    {{-- Add more fields as needed --}}
                                    <div class="time"><strong>{{ $kridaran->created_at->diffForHumans() }}</strong></div>
                                </div>

                                {{-- Button on the right side --}}
                                <div class="ml-auto">
                                    <button class="btn btn-primary" onclick="addToTodoList({{ $kridaran->id }}, '{{ $kridaran->name }}', '{{ $kridaran->message }}')">Add to To-Do List</button>
                                </div>
                                <div class="ml-2"> <!-- Add margin-left class for horizontal spacing -->
                                    <button class="btn btn-danger" onclick="deleteKridaran({{ $kridaran->id }})"> <i class="fas fa-trash"></i> </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
    </div>

    <script>

        function deleteKridaran(kridaranId) {
            if (confirm("Are you sure you want to delete this Kridaran data?")) {
                $.ajax({
                    type: 'DELETE',
                    url: '/kridaran/delete/' + kridaranId,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        // Remove the card from the view
                        $('#kridaran_' + kridaranId).remove();
                        alert('Kridaran data deleted successfully!');
                    },
                    error: function () {
                        alert('Failed to delete Kridaran data. Please try again.');
                    }
                });
            }
        }

        $(document).ready(function() {
        // Initialize toastr with custom options
        toastr.options = {
            "positionClass": "toast-top-right", // Display notifications in top-right corner
        };
    });

    function addToTodoList(kridaranId, name, message) {
        // Make an AJAX request to send kridaran information to the controller
        $.ajax({
            type: 'POST',
            url: '{{ route("todo-list.add") }}',
            data: {
                kridaranId: kridaranId,
                name: name, // Pass the 'name' parameter
                message: message, // Pass the 'message' parameter
                _token: '{{ csrf_token() }}',
            },
            success: function (response) {
                console.log(response);
                // Check if the response is defined and has the expected properties
                if (response && response.success) {
                    // Show a success notification using Toastr
                    toastr.success('Kridaran added to the to-do list.', '', {"positionClass": "toast-top-right"});
                } else {
                    // Show an error notification using Toastr if response is defined
                    if (response && response.message) {
                        toastr.error(response.message, '', {"positionClass": "toast-top-right"});
                    } else {
                        // Show a generic error message if response is not defined or doesn't have a message
                        toastr.error('Failed to add Kridaran to the to-do list. Please try again.', '', {"positionClass": "toast-top-right"});
                    }
                }
            },
            error: function (xhr, status, error) {
                // Handle error response if needed
                console.error(xhr.responseText);
                // Show an error notification using Toastr
                toastr.error('Failed to add Kridaran to the to-do list. Please try again.', '', {"positionClass": "toast-top-right"});
            }
        });
    }
</script>


@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Page Specific JS File -->
@endpush
