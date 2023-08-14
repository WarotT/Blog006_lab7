@extends('master')

@section('title', 'Content CRUD')

@section('content')

    <h1>First time to my blog content.</h1>

    <table class="table table-bordered" id="tbContent">
        <thead>
            <tr>
                <th>ID</th>
                <th>voteStatus</th>
                <th>Content_ID</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($votes->sortBy('content_id')->groupBy('content_id') as $contentId => $votesGrouped)
                <tr>
                    <td>{{ $contentId }}</td>
                    <td>{{ $votesGrouped->where('voteStatus', 1)->count() }}</td>
                    <td>{{ $votesGrouped->where('voteStatus', 0)->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/content') }}" role="button" class="btn btn-sm btn-danger">Back</a>
@endsection
