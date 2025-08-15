@extends('layouts.base')

@section('body')
    <x-header />
    
    @yield('content')
    
    @isset($slot)
        {{ $slot }}
    @endisset

    <x-footer />
@endsection
