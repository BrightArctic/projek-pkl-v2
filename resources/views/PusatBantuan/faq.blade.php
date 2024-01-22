@extends('layouts.app')

@section('title', 'Default Layout')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Frequently Asked Question</h1>
            </div>

            <div class="section-body">
                <div class="card">
                    <div class="card-header">
                        <h4>Q: Bagaimana cara logout?</h4>
                    </div>
                    <div class="card-body">
                        <p>A: Klik yang ada di kanan atas lalu tekan logout</p>
                    </div>
                    <div class="card-header">
                        <h4>Q: [pertanyaan lain]</h4>
                    </div>
                    <div class="card-body">
                        <p>A: [jawaban yang lain]</p>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush

