@extends('template.main')

@section('content-main')
    @foreach ($attendances as $item)
        <h1>{{ $item->userId }}</h1>
    @endforeach
@endsection
