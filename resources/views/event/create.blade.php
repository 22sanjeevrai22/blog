@extends('layouts.master')



@section('content')

<div class="container mt-3">
        <h2 class="text-success">Create New Blog</h2>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="{{route('event.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mt-3">
                        <div class="form-group col-md-12">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Title of the Blog">

                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" rows="10" placeholder="Description about the blog"></textarea>

                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="form-group mt-3">
                        <label for="photo">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" id="photo" accept='image/jpg, image/png'>
                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                    <button type="submit" class="btn btn-primary mt-3">Create Blog</button>
                </form>
            </div>
        </div>
    </div>

@endsection
