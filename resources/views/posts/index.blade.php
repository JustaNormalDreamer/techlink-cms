@extends('cms::layouts.master')

@section('title', 'Categories Index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Posts Count</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($models && $models->count() > 0)
                            @foreach($models as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->posts_count }}</td>
                                    @include('cms::components.index._actions', [
                                        'type' => 'posts',
                                        'model' => $post
                                ])
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="100"> No data found.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

            @include('cms::components.index._pagination')

            </div>
        </div>
    </div>
@endsection
