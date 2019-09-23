@extends('layouts.default.master')

@section('content')
    <div class="container">
        {{ Breadcrumbs::render('sitetronic-pages-admin-index') }}
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><h3>Pages</h3></div>
                <div class="panel-heading">Page {{ $pages->currentPage() }} of {{ $pages->lastPage() }}</div>
                <div class="panel-body">
                    <table class="table striped">
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Controls</th>
                        </tr>
                    @foreach ($pages as $page)
                        <tr>
                            <td>
                                <a href="{{ route('admin.pages.show', $page->id ) }}">{{ $page->title }}</a>
                            </td>
                            <td>
                                {{  str_limit($page->content, 100) }} {{-- Limit teaser to 100 characters --}}
                            </td>
                            <td>
                                <a href='{{ route('admin.pages.edit', $page->id ) }}'>Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
            <div class="text-center">
                {!! $pages->links() !!}
            </div>
        </div>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-lg btn-block">Add Page</a>

    </div>
@endsection
