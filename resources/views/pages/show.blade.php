@extends('layouts.default.master')

@section('title', 'View Page')

@section('content')

<div class="container">
    {!! $page->content !!}
</div>

@endsection
