@extends('layouts.app')

@section('title', 'Bug Report Admin')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Bug Report Admin</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Bug Reports</a></div>
                    <div class="breadcrumb-item">Bug Report Admin</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">List of Bug Reports</h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bugReports as $bugReport)
                            <tr>
                                <td>{{ $bugReport->id }}</td>
                                <td>{{ $bugReport->name }}</td>
                                <td>{{ $bugReport->email }}</td>
                                <td>{{ $bugReport->subject }}</td>
                                <td>{{ $bugReport->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
