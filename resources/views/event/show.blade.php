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
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title of the Blog" value="{{ $event->title }}">

                        </div>
                    </div>

                    <div class="form-group mt-3">
                    
                        <textarea class="form-control" name="description" id="description" rows="10" placeholder="Description about the event">{{$event->description}}
                        </textarea>


                </fieldset>
                </form>
                <br>

                
                <div>
                    <h3>Other Comments</h3>
                    <br>
                    @foreach($event->comments as $comment)

                    {{$comment->description}} <b>::By</b> <i> {{$comment->user->name}} </i> <b>at</b> {{$comment->updated_at}}
                    <br>

                    @if($comment->image)
                    <img src="{{ asset('storage/'.$comment->image)}}" width=80 height=80>
                    @endif

                    @if($comment->user_id == auth()->id())
                    
                    <form action="{{ route('comment.delete', ['comment' => $comment -> id]) }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit" >Delete</button>
                    </form>
                    
                    @endif
                    <br>
                    <br>
                    
                    @endforeach
                </div>
                
                
                <form action="{{route('event.savecomment',['event' => $event-> id ])}}" method="post" enctype="multipart/form-data">
                    @csrf

                        <div class="form-group mt-3">
                        
                            <label for="comment">Comment...</label>
                            <textarea class="form-control" name="description" id="description" rows="3"        placeholder="Write your comment here"></textarea>

                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        <div class="form-group mt-3">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" name="photo" id="photo" accept='image/jpg, image/png'>
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                        </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit Comment</button>
                        </div>

                       
                </div> 
                    
                </form>

                
                    
            </div>
        </div>
    </div>

@endsection
