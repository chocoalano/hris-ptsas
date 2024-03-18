@extends('layouts.app')
@section('title', $content['page-title'])
@section('content-description', $content['page-description'])
@section('content-keyword', $content['page-keywords'])
@section('dark', 'dark')
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
        {{-- jumbotron::start --}}
        <div class="position-relative bg-primary overflow-hidden">
            <div class="container position-relative zi-2 content-space-3 content-space-md-5">
                <div class="w-md-75 w-xl-65 text-center mx-md-auto">
                    <div class="mb-7">
                        <h1 class="display-4 text-white mb-4">{{ $content['jumbotron']['title'] }}</h1>
                        <p class="lead text-white mb-4">{{ $content['jumbotron']['description'] }}</p>
                    </div>
                </div>
            </div>
            <figure class="position-absolute top-0 start-0 w-65">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1246 1078">
                    <g opacity=".4">
                        <linearGradient id="doubleEllipseTopLeftID1" gradientUnits="userSpaceOnUse" x1="2073.5078"
                            y1="1.7251" x2="2273.4375" y2="1135.5818" gradientTransform="matrix(-1 0 0 1 2600 0)">
                            <stop offset="0.4976" style="stop-color:#282828" />
                            <stop offset="1" style="stop-color:#282828" />
                        </linearGradient>
                        <polygon fill="url(#doubleEllipseTopLeftID1)" points="519.8,0.6 0,0.6 0,1078 863.4,1078   " />
                        <linearGradient id="doubleEllipseTopLeftID2" gradientUnits="userSpaceOnUse" x1="1717.1648"
                            y1="3.779560e-05" x2="1717.1648" y2="644.0417" gradientTransform="matrix(-1 0 0 1 2600 0)">
                            <stop offset="1.577052e-06" style="stop-color:#282828" />
                            <stop offset="1" style="stop-color:#282828" />
                        </linearGradient>
                        <polygon fill="url(#doubleEllipseTopLeftID2)" points="519.7,0 1039.4,0.6 1246,639.1 725.2,644   " />
                    </g>
                </svg>
            </figure>
            <div class="shape shape-bottom zi-1" style="margin-bottom: -.125rem">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                    <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                </svg>
            </div>
        </div>
        {{-- jumbotron::end --}}
        {{-- content-client-top::start --}}
        <div class="border-bottom">
            <div class="container pb-3 pb-lg-5">
                <div class="w-lg-75 mx-lg-auto">
                    <div class="row">
                        @foreach ($content['content-client-top'] as $k)
                            <div class="col text-center py-3">
                                <img class="avatar avatar-lg avatar-4x3" src="{{ asset('storage/'.$k) }}" alt="Logo">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{-- content-client-top::end --}}
        {{-- container-content-first::start --}}
        <div class="container content-space-2 content-space-lg-3">
            <div class="row justify-content-lg-between align-items-lg-center">
                <div class="col-lg-5 mb-9 mb-lg-0">
                    <div class="mb-3">
                        <h2 class="h1">{{ $content['container-content-first']['title'] }}</h2>
                    </div>
                    <p>{{ $content['container-content-first']['paragraph'] }}</p>
                    <p>{{ $content['container-content-first']['description'] }}</p>
                    <div class="mt-4">
                        <a class="btn btn-primary btn-transition px-5"
                            href="{{ $content['container-content-first']['btn-link'] }}">Start Now</a>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5">
                    <div class="position-relative mx-auto" style="max-width: 28rem; min-height: 30rem;">
                        <figure class="position-absolute top-0 end-0 zi-2 me-10" data-aos="fade-up">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 450 450" width="165"
                                height="165">
                                <g>
                                    <defs>
                                        <path id="circleImgID2" d="M225,448.7L225,448.7C101.4,448.7,1.3,348.5,1.3,225l0,0C1.2,101.4,101.4,1.3,225,1.3l0,0
                                    c123.6,0,223.7,100.2,223.7,223.7l0,0C448.7,348.6,348.5,448.7,225,448.7z" />
                                    </defs>
                                    <clipPath id="circleImgID1">
                                        <use xlink:href="#circleImgID2" />
                                    </clipPath>
                                    <g clip-path="url(#circleImgID1)">
                                        <image width="450" height="450" xlink:href="{{ asset('storage/'.$content['container-content-first']['figure']['image_first']) }}">
                                        </image>
                                    </g>
                                </g>
                            </svg>
                        </figure>
                        <figure class="position-absolute top-0 start-0" data-aos="fade-up" data-aos-delay="300">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 335.2 335.2" width="120"
                                height="120">
                                <circle fill="none" stroke="#377dff" stroke-width="75" cx="167.6" cy="167.6"
                                    r="130.1" />
                            </svg>
                        </figure>
                        <figure class="d-none d-sm-block position-absolute top-0 start-0 mt-10" data-aos="fade-up"
                            data-aos-delay="200">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 515 515" width="200"
                                height="200">
                                <g>
                                    <defs>
                                        <path id="circleImgID4" d="M260,515h-5C114.2,515,0,400.8,0,260v-5C0,114.2,114.2,0,255,0h5c140.8,0,255,114.2,255,255v5
                                    C515,400.9,400.8,515,260,515z" />
                                    </defs>
                                    <clipPath id="circleImgID3">
                                        <use xlink:href="#circleImgID4" />
                                    </clipPath>
                                    <g clip-path="url(#circleImgID3)">
                                        <image width="515" height="515" xlink:href="{{ asset('storage/'.$content['container-content-first']['figure']['image_second']) }}"
                                            transform="matrix(1 0 0 1 1.639390e-02 2.880859e-02)"></image>
                                    </g>
                                </g>
                            </svg>
                        </figure>
                        <figure class="position-absolute top-0 end-0" style="margin-top: 11rem; margin-right: 13rem;"
                            data-aos="fade-up" data-aos-delay="250">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 67 67" width="25"
                                height="25">
                                <circle fill="#00C9A7" cx="33.5" cy="33.5" r="33.5" />
                            </svg>
                        </figure>
                        <figure class="position-absolute top-0 end-0 me-3" style="margin-top: 8rem;" data-aos="fade-up"
                            data-aos-delay="350">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 141 141" width="50"
                                height="50">
                                <circle fill="#FFC107" cx="70.5" cy="70.5" r="70.5" />
                            </svg>
                        </figure>
                        <figure class="position-absolute bottom-0 end-0" data-aos="fade-up" data-aos-delay="400">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 770.4 770.4"
                                width="280" height="280">
                                <g>
                                    <defs>
                                        <path id="circleImgID6" d="M385.2,770.4L385.2,770.4c212.7,0,385.2-172.5,385.2-385.2l0,0C770.4,172.5,597.9,0,385.2,0l0,0
                                    C172.5,0,0,172.5,0,385.2l0,0C0,597.9,172.4,770.4,385.2,770.4z" />
                                    </defs>
                                    <clipPath id="circleImgID5">
                                        <use xlink:href="#circleImgID6" />
                                    </clipPath>
                                    <g clip-path="url(#circleImgID5)">
                                        <image width="900" height="900" xlink:href="{{ asset('storage/'.$content['container-content-first']['figure']['image_thirth']) }}"
                                            transform="matrix(1 0 0 1 -64.8123 -64.8055)"></image>
                                    </g>
                                </g>
                            </svg>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        {{-- container-content-first::end --}}
        {{-- container-content-second::start --}}
        <div class="container content-space-t-2 content-space-t-lg-3">
            <div class="row justify-content-lg-center">
                @foreach ($content['container-content-second'] as $k)
                    <div class="col-md-6 col-lg-5 mb-3 mb-md-7">
                        <div class="d-flex pe-lg-5" data-aos="fade-up">
                            <div class="flex-shrink-0">
                                <span class="svg-icon text-primary">
                                    <img src="{{ asset('storage/'.$k['svg']) }}" alt="" width="70" height="70"/>
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-4">
                                <h4>{{ $k['title'] }}</h4>
                                <p>{{ $k['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- container-content-second::end --}}
        {{-- container-content-thirth::start --}}
        <div class="container content-space-2 content-space-lg-3">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
                <h2 class="h1">{{ $content['container-content-thirth']['title'] }}</h2>
                <p>{{ $content['container-content-thirth']['description'] }}</p>
            </div>
            <div class="row gx-3 mb-5 mb-md-9">
                @foreach ($products as $k => $v)
                    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
                        <a class="card card-transition h-100" href="{{ route('product.show', Str::slug($v->title)) }}">
                            <img class="card-img-top" src="{{ asset('storage/' . $v->image) }}" alt="Image Description">
                            <div class="card-body">
                                <span class="card-subtitle text-primary">{{ ucfirst($v->category) }}</span>
                                <h5 class="card-text lh-base">{{ ucfirst(Str::limit($v->title, 20)) }}</h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <div class="card card-info-link card-sm">
                    <div class="card-body">Want to read more?
                        <a class="card-link ms-2" href="{{ $content['container-content-thirth']['btn-link'] }}">Go here
                            <span class="bi-chevron-right small ms-1"></span></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- container-content-thirth::end --}}
        {{-- container-content-fiveth::start --}}
        <div class="container content-space-2 content-space-b-lg-3">
            <div class="w-md-75 w-lg-50 text-center mx-md-auto mb-6">
                <h2>{{ $content['container-content-fourth']['title'] }}</h2>
            </div>
            <div class="row justify-content-center text-center">
                @foreach ($content['container-content-fourth']['img-client'] as $k)
                    <div class="col-4 col-sm-3 col-md-2 py-3">
                        <img class="avatar avatar-lg avatar-4x3 avatar-centered" src="{{ asset('storage/'.$k) }}"
                            alt="Logo">
                    </div>
                @endforeach
            </div>
        </div>
        {{-- container-content-fiveth::end --}}
    </main>
@endsection
