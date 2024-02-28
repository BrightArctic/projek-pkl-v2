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
                        {{-- profile photo --}}
                        <div class="card-body d-flex align-items-center">
                            <img alt="image" src="{{ asset('img/avatar/avatar-1.png') }}" class="rounded-circle mr-3 mb-2" style="width: 40px; height: 40px;">
                            {{-- Add your item details here --}}
                            <div class="media-body">
                                <div class="media-title"><strong>Reporter: {{ $item->name }}</strong></div>
                                <p class="mb-1"><strong>Subject description:</strong> {{ $item->subject }}</p>
                                <p class="mb-1"><strong>Description:</strong> {{ $item->message }}</p>
                                {{-- Display the image --}}
                                @if ($item->bugReport)
                                @if ($item->bugReport->image_path)
                                    <li class="media">
                                        <img src="{{ $item->bugReport->image_path }}" alt="Bug Report Image" width="300" height="200" class="img-fluid rounded">
                                    </li>
                                @endif
                            @endif


                                {{-- Add more fields as needed --}}
                                <!-- Assuming you have a 'created_at' field -->
                                <div class="time"><strong> masalah/kritik dan saran dilaporkan pada tanggal:</strong> {{ $item->created_at}}</div>
                            </div>

                            {{-- Button on the right side --}}
                            <div class="ml-auto">
                                <form action="{{ route('todo.delete', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
