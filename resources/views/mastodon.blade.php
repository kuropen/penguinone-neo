@extends('layout')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2>Mastodon Instance Introduction</h2>
        <dl>
            <dt>Instance Title</dt>
            <dd>{{$instance->title}}</dd>
            <dt>URL</dt>
            @php
            $fullUrl = 'https://' . $instance->uri;
            @endphp
            <dd><a href="{{$fullUrl}}" target="_blank">{{$fullUrl}}</a></dd>
            <dt>Description</dt>
            <dd>{!! $instance->description !!}</dd>
        </dl>
    </div>
</div>
@endsection