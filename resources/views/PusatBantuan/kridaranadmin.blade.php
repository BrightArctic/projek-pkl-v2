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
                                <button class="btn btn-primary" onclick="deleteKridaran({{ $kridaran->id }})">Delete</button>
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
    </script>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush
