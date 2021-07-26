@extends('layouts.master')



@section('content')

<div class="container mt-3">
        <h2 class="text-success">View Blog</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="#" method="#">
    
                <fieldset disabled="disabled">
                
                    <div class="form-row mt-3">
                        <div class="form-group col-md-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title of the Event" value="{{ $event->title }}">

                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="10" placeholder="Description about the event">{{$event->description}}
                        </textarea>

                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </fieldset>
                </form>


                <form action="{{route('event.savecomment')}}" method="post">
                    @csrf

                        <div class="form-group mt-3">
                        
                            <label for="comment">Comment</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3"        placeholder="Write your comment here"></textarea>

                            @error('comment')
                            <span class="text-danger"></span>
                            @enderror
                        </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit Comment</button>
                        </div>
                </form>
                    
                    
            </div>
        </div>
    </div>

@endsection
