@extends('layouts.app')

@section('title', 'To-Do List')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>To-Do List</h1>
            </div>
            <div class="section-body">
                @foreach($todoListItems as $item)
                    <div class="card" id="todoItem_{{ $item->id }}">
                        <div class="card-body d-flex align-items-center">
                            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-3 mb-2" style="width: 40px; height: 40px;">
                            {{-- Add your item details here --}}
                            <div class="media-body">
                                <div class="media-title"><strong>Reporter: {{ $item->name }}</strong></div>
                                <p class="mb-1"><strong>Description:</strong> {{ $item->message }}</p>
                                {{-- Add more fields as needed --}}
                                <!-- Assuming you have a 'created_at' field -->
                                <div class="time"><strong>{{ $item->created_at->diffForHumans() }}</strong></div>
                            </div>

                            {{-- Button on the right side --}}
                            <div class="ml-auto">
                                <!-- Add functionality to edit or delete the item if needed -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
