@extends('layouts.app')
@section('title', $content['page-title'])
@section('content-description', $content['page-description'])
@section('content-keyword', $content['page-keywords'])
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
        <!-- Gallery -->
        <div class="container content-space-t-3 content-space-t-lg-5">
            <div class="w-lg-75 text-center mx-lg-auto">
                <div class="mb-5 mb-md-10">
                    <h1 class="display-4">{{ ucfirst($content['gallery']['title']) }}</h1>
                    <p class="lead">{{ ucfirst($content['gallery']['description']) }}</p>
                </div>
            </div>

            <div class="row gx-3">
                @foreach ($content['gallery']['image'] as $k)
                <div class="col mb-3">
                    <div class="bg-img-start" style="background-image: url({{ asset('storage/'.$k) }}); height: 15rem;"></div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- End Gallery -->

        <!-- Feature Stats -->
        <div class="container content-space-2 content-space-lg-3">
            <div class="row justify-content-lg-center">
                @foreach ($content['feature'] as $k)
                <div class="col-sm-4 col-lg-3 mb-7 mb-sm-0">
                    <div class="text-center">
                        <h2 class="display-4">{{ $k['value'] }}</h2>
                        <p class="small">{{ ucfirst($k['title']) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- End Feature Stats -->

        <div class="border-top mx-auto" style="max-width: 25rem;"></div>
        <!-- Info -->
        <div class="container content-space-2 content-space-lg-3">
            <div class="row justify-content-lg-between">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h2>{{ ucfirst($content['info']['col-1']) }}</h2>
                </div>
                <div class="col-lg-6">{!! $content['info']['col-2'] !!}</div>
            </div>
        </div>
        <!-- End Info -->

        <div class="border-top mx-auto" style="max-width: 25rem;"></div>
    </main>
@endsection
