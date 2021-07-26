
@extends('layouts.master')

@section('content')

<div class="container mt-3">
        <h2 class="text-success">Blog List</h2>
        <hr>

        @if(session()->has('message'))
            {{session()->get('message')}}
        @endif

        <div class="row">
            @foreach($events as $event)          
            <div class="col-md-4">
                <div class="card">
                <a href="{{ route('event.savecomment', ['event' => $event -> id]) }}"></a>
                    <a href="{{ route('event.show', ['event' => $event -> id]) }}">
                        <img src="{{ asset('storage/'.$event->event_image)}}" class="card-img-top" height=375>
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        
                        <p>
                            <b>Date: </b> {{ $event->date }}
                        </p>
                        <p>
                            <b>Author: </b> {{ $event->user->name }}
                        </p>
                        
                        @auth
                            @if($event->user_id == auth()->id())

                                <a href="{{ route('event.edit', ['event' => $event -> id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{route('event.delete', ['event' => $event->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Delete</button>
                                </form>

                            @endif
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>



@endsection
