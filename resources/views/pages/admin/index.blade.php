@extends('layouts.default.master')

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('sitetronic-posts-admin-index') }}
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Posts</h3></div>
                <div class="panel-heading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>
                @foreach ($posts as $post)
                    <div class="panel-body">
                        <li style="list-style-type:disc">
                            <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
                                <p class="teaser">
                                    {{  str_limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}
                                </p>
                            </a>
                        </li>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                {!! $posts->links() !!}
            </div>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-lg btn-block">Add Post</a>

    </div>
@endsection
