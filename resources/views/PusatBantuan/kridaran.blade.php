@extends('layouts.app')

@section('title', 'Send Message')

@push('style')
    <!-- CSS Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kritik Dan Saran</h1>
                <div class="section-header-breadcrumb">
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Silahkan Isi Pesan!</h2>
                <p class="section-lead">
                    Isilah Kritik Dan Saran Di Dalam Kolom Pesan
                </p>

                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 mx-auto my-5">
                        <div class="card">
                            <form id="kridaranForm" method="post" action="{{ route('submit.kridaran') }}">
                                @csrf <!-- Add the CSRF token for security -->
                                <div class="card-header">
                                    <h4>Form Kritik Dan Saran</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Anda</label>
                                        <input type="text" class="form-control" name="name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" required="">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Kritik Dan Saran Anda:</label>
                                        <textarea class="form-control" name="message" data-height="150" required=""></textarea>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <button class="btn btn-primary" type="submit" style="width: 50%; font-size: 105%;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function () {
            // Intercept the form submission
           $('#kridaranForm').submit(function (e) {
                e.preventDefault();

                // Perform AJAX form submission
                $.ajax({
                    type: 'post',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function () {
                        // Display success message in the general-dashboard
                        alert('Bug reported successfully! Redirecting to dashboard...');
                        window.location.href = '/dashboard-general-dashboard';
                    },
                    error: function () {
                        // Handle error if the form submission fails
                        alert('Bug report submission failed. Please try again.');
                    }
                });
            });
        });
    </script>
@endsection
