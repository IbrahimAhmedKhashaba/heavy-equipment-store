@extends('layouts.dashboard.app')

@section('title', __('dashboard.home'))
@section('content')
    <!-- Content Row -->
    <div class="app-content content">
        <div class="content-wrapper">
            @livewire('statistics')

            <div class="row">
                <div class=" col-md-6 ">
                    <div class="card shadow p-2">
                        <h3>{{ $productsChart->options['chart_title'] }}</h3>
                        {!! $productsChart->renderHtml() !!}
                    </div>
                </div>
                <div class=" col-md-6">
                    <div class="card shadow p-2">
                        <h3>{{ $categoriesChart->options['chart_title'] }}</h3>
                        {!! $categoriesChart->renderHtml() !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow p-2">
                        <h3>{{ $adminsChart->options['chart_title'] }}</h3>
                        {!! $adminsChart->renderHtml() !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow p-2">
                        <h3>{{ $contactsChart->options['chart_title'] }}</h3>
                        {!! $contactsChart->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
@endsection
@push('js')
    {!! $productsChart->renderChartJsLibrary() !!}
    {!! $productsChart->renderJs() !!}

    {!! $categoriesChart->renderChartJsLibrary() !!}
    {!! $categoriesChart->renderJs() !!}

    {!! $adminsChart->renderChartJsLibrary() !!}
    {!! $adminsChart->renderJs() !!}

    {!! $contactsChart->renderChartJsLibrary() !!}
    {!! $contactsChart->renderJs() !!}
@endpush
