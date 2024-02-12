@extends('layouts.app')

@section('title', 'Default Layout')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kridaran Admin</h1>
            </div>
            <div class="section-body">
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
            // Check if the request was successful and handle accordingly
            if (response.success) {
                // Optionally, you can perform additional actions upon success
                alert('Kridaran added to the to-do list.');
            } else {
                alert(response.message); // Display the error message
            }
        },
        error: function (xhr, status, error) {
            // Handle error response if needed
            console.error(xhr.responseText);
        }
    });
}



</script>


@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush
