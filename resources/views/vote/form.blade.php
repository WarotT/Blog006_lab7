@extends('master');

@section('title', 'Content CRUD');

@section('content')
    @if (empty($contents->id))
        <h1>Error!</h1>
    @else
        <h1>Voting!</h1>
    @endif


    <form action="{{ url('/vote') }}" method="post">

        @csrf

        <input type="text" id="content_id" name="content_id" value="{{ old('id', $contents->id) }}">

        <div>
            <label>Like?</label>
        </div>
        <div>
            <label class="radio-inline">
                <input type="radio" id="voteStatus" name="voteStatus" value="1" checked> Like
            </label>
            <label class="radio-inline">
                <input type="radio" id="voteStatus" name="voteStatus" value="0"> Dislike
            </label>
        </div>

        <button type="submit" class="btn btn-sm btn-primary">Save</button>
        <a href="{{ url('/content') }}" role="button" class="btn btn-sm btn-danger">Back</a>
    </form>
@endsection
