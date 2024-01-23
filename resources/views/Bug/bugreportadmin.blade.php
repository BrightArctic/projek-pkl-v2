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
                <div class="card">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="media">
                                <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-3 mb-2" style="width: 40px; height: 40px;">
                                <div class="media-body">
                                    <div class="media-title">Nama: {{ $bugReport->name }}</div>
                                    <p class="mb-1">Subject: {{ $bugReport->subject }}</p>
                                    <p class="mb-1">Message: {{ $bugReport->message }}</p>
                                    <div class="time"><strong>10 Hours Ago</strong></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush


