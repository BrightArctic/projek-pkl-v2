@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">

         <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            {{-- Admin --}}
            @if(auth()->user()->role == 'admin')
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                            {{ $user }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-boxes-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Barang</h4>
                            </div>
                            <div class="card-body">
                            {{ $barang }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-boxes-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Barang Dipinjam</h4>
                            </div>
                            <div class="card-body">
                                {{ $peminjam }}
                            </div>
                        </div>
                    </div>
                </div>
<div class="section-body">
    <div class="card custom-width-card">
        <div class="card-body">
            <h2>Announcement</h2>
        </div>
        <div class="card-body">
            @php
                // Retrieve the latest announcement
                $latestAnnouncement = \App\Models\Announcement::latest()->first();
            @endphp

@if($latestAnnouncement)
<p>
    <div class="dropdown-item-avatar">
        <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-3 mb-2" style="width: 40px; height: 40px;">
    </div>
    <div class="dropdown-item-desc">
        <b>{{ $latestAnnouncement->user_name }}</b>
        <p>{{ $latestAnnouncement->message }}</p>
        <div class="time">10 Hours Ago</div>
    </div>
</p>
@else
<p>No announcement available</p>
@endif

        </div>
        <div class="card-footer">
            <!-- Add a form for posting announcements -->
            <form action="{{ route('postAnnouncement') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="message">Post An Announcement:</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                    <!-- Add a hidden input field for the user's name -->
                    <input type="hidden" name="userName" value="{{ auth()->user()->name }}">
                </div>
                <button class="btn btn-primary" type="submit">Announce</button>
            </form>

        </div>
    </div>
</div>

                {{-- <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Line Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div> --}}

                {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Stock Barang</h4>
                            </div>
                            <div class="card-body">
                                {{ $ba }}
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            @endif

            {{-- Mahasiswa --}}
            @if(auth()->user()->role == 'mahasiswa')
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total User</h4>
                            </div>
                            <div class="card-body">
                            {{ $user }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-boxes-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Barang</h4>
                            </div>
                            <div class="card-body">
                               {{ $barang }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="card custom-width-card">
                        <!-- Card content goes here -->
                        <div class="card">
                            <div class="card-body">
                                <h2>Announcement</h2>
                            </div>
                            <div class="card-body">
                                @php
                                    // Retrieve the latest announcement
                                    $latestAnnouncement = \App\Models\Announcement::latest()->first();
                                @endphp

                                @if($latestAnnouncement)
                                    <p>{{ $latestAnnouncement->message }}</p>
                                @else
                                    <p>No announcement available</p>
                                @endif
                            </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                47
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            @endif
            {{-- Content --}}
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-chartjs.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
