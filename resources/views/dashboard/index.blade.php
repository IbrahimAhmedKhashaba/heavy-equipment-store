@extends('layouts.dashboard.app')

@section('title', __('dashboard.home'))
@section('content')
    <!-- Content Row -->
    <div class="app-content content">
        <div class="content-wrapper">
            @livewire('statistics')
        </div>
    </div>
    <!-- Content Row -->
@endsection
