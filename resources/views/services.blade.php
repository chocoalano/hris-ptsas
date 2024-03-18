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

            var swiper = new Swiper('.js-swiper-gallery', {
                slidesPerView: 1,
                breakpoints: {
                    620: {
                        slidesPerView: 2,
                        spaceBetween: 15,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 15,
                    },
                },
                on: {
                    'imagesReady': function(swiper) {
                        const preloader = swiper.el.querySelector('.js-swiper-gallery-preloader')
                        preloader.parentNode.removeChild(preloader)
                    }
                }
            });
        })()
    </script>
@endsection
@section('main')
    <main id="content" role="main">
        <!-- Gallery -->
        <div class="container content-space-t-3 content-space-t-lg-5">
            <div class="w-lg-65 text-center mx-lg-auto mb-5 mb-md-9">
                <h1>{{ ucfirst($content['gallery']['title']) }}</h1>
            </div>
            <div class="row gx-3 gx-lg-4">
                <div class="col-5 align-self-end">
                    <img class="img-fluid rounded-2" src="{{ asset('storage/'.$content['gallery']['image-1']) }}" alt="Image Description">
                </div>
                <div class="col-7">
                    <div class="ms-lg-4">
                        <img class="img-fluid rounded-2" src="{{ asset('storage/'.$content['gallery']['image-2']) }}" alt="Image Description">
                    </div>
                </div>
            </div>
        </div>
        <!-- End Gallery -->

        <!-- Icon Blocks -->
        <div class="container content-space-2 content-space-lg-3">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <span class="text-cap">{{ ucfirst($content['icon-blocks']['text-cap']) }}</span>
                <h2>{{ ucfirst($content['icon-blocks']['h2-title']) }}</h2>
            </div>
            <div class="row justify-content-lg-center">
                @foreach ($superiority as $k => $V)
                    <div class="col-md-6 col-lg-5 mb-3 mb-md-5 mb-lg-7">
                        <div class="d-flex pe-md-5">
                            <div class="flex-shrink-0">
                                <div class="svg-icon text-primary">
                                    {!! $V->svg !!}
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4>{{ ucfirst($V->title) }}</h4>
                                <p>{{ ucfirst($V->description) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End Icon Blocks -->

        {{-- swipper slider::start --}}
        <div class="mx-3 mb-10">
            <div class="js-swiper-gallery swiper">
                <div class="swiper-wrapper">
                    @foreach ($product as $k => $v)
                        <div class="swiper-slide rounded-2 bg-img-start" style="background-image: url({{ asset('storage/'.$v->image) }}); min-height: 20rem;">
                            <img class="d-none" src="{{ asset('storage/'.$v->image) }}" alt="Image Description">
                        </div>
                    @endforeach
                </div>
                <div class="js-swiper-gallery-preloader swiper-preloader">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- swipper slider::end --}}

        <!-- Clients -->
        <div class="container mt-10 content-space-b-2 content-space-b-lg-3">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2>{{ ucfirst($content['clients']['title']) }}</h2>
            </div>
            <div class="w-lg-75 mx-lg-auto">
                <div class="row">
                    @foreach ($content['clients']['img-client'] as $k)
                        <div class="col text-center py-3">
                            <img class="avatar avatar-lg avatar-4x3" src="{{ asset('storage/'.$k) }}" alt="Logo">
                        </div>
                    @endforeach
                </div>
                <!-- End Row -->
            </div>
        </div>
        <!-- End Clients -->
    </main>
@endsection
