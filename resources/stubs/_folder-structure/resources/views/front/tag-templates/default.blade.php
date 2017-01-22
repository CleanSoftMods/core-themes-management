@extends('webed-theme-DummyAlias::front._master')

@section('content')
    <article>
        {!! $object->content or '' !!}
    </article>
@endsection
