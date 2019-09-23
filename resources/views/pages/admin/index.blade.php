@extends('layouts.default.master')

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('sitetronic-pages-admin-index') }}
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Pages</h3></div>
                <div class="panel-heading">Page {{ $pages->currentPage() }} of {{ $pages->lastPage() }}</div>
                @foreach ($pages as $page)
                    <div class="panel-body">
                        <li style="list-style-type:disc">
                            <a href="{{ route('pages.show', $pages->id ) }}"><b>{{ $pages->title }}</b><br>
                                <p class="teaser">
                                    {{  str_limit($pages->content, 100) }} {{-- Limit teaser to 100 characters --}}
                                </p>
                            </a>
                        </li>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                {!! $pages->links() !!}
            </div>
        </div>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-lg btn-block">Add Page</a>

    </div>
@endsection
