@extends('layouts.app')
@section('title', 'privacy-policy')
@section('content-description', 'privacy-policy')
@section('content-keyword', 'privacy-policy')
@section('dark', 'light')
@section('css', '')
@section('js')
    <script>
        (function() {
            new HSHeader('#header').init()
            new HSShowAnimation('.js-animation-link')
            HSBsValidation.init('.js-validate', {
                onSubmit: data => {
                    data.event.preventDefault()
                    alert('Submited')
                }
            })
            HSBsDropdown.init()
            new HSGoTo('.js-go-to')
            AOS.init({
                duration: 650,
                once: true
            });
            new HSToggleSwitch('.js-toggle-switch')
        })()
    </script>
@endsection
@section('main')
    <main id="content" role="main">
        <div class="container content-space-3 content-space-lg-4">
            <div class="card card-lg">
                <div class="card-header bg-dark py-sm-10">
                    <h1 class="card-title h2 text-white">{{ ucfirst($pp->title) }}</h1>
                    <p class="card-text text-white">Last modified: {{ date('d M Y', strtotime($pp->updated_at)) }} (view archived versions)</p>
                </div>
                <div class="card-body">
                   {!! $pp->content !!}
                </div>
            </div>
        </div>
    </main>
@endsection
