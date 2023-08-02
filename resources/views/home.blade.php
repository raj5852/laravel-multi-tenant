@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Title" class="form-control"><br>
        <textarea name="description" id="" cols="30" class="form-control" rows="10" placeholder="Description"></textarea>
        <br>
        <input type="submit" class="form-control  btn btn-success" >
    </form>
    <br><br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <td>Title</td>
                <td>Description</td>
            </tr>
        </thead>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }} </td>
                <td>{{ $post->description }} </td>
            </tr>
        @endforeach

    </table>
</div>
@endsection
