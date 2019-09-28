@extends('layouts.default.master')

@section('title', 'View Page')

@section('content')

<div class="container">
    {{ Breadcrumbs::render('sitetronic-pages-admin-show') }}
    <h1>{{ $page->title }}</h1>
    <hr>
    <p class="lead">{{ $page->content }}</p>
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.pages.destroy', $page->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit Page')
    <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete Page')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}

</div>

@endsection
