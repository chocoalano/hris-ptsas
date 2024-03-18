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
    <div class="container content-space-t-3 content-space-t-lg-5 content-space-b-1 content-space-b-md-2">
        <div class="w-md-75 w-lg-50 text-center mx-md-auto">
            <h1 class="display-4">{{ ucfirst($content['jumbotron']['title']) }}</h1>
            <p class="lead">{{ ucfirst($content['jumbotron']['description']) }}</p>
        </div>
    </div>
    <div class="container content-space-b-2 content-space-b-lg-3">
        <div class="row justify-content-md-between align-items-md-center mb-7">
            <div class="col-md-5 mb-5 mb-md-0">
                <div class="d-md-flex align-items-md-center text-center text-md-start">
                    <span class="d-block me-md-3 mb-2 mb-md-1">Categories:</span>
                    @foreach ($category as $k => $v)
                        <a class="btn btn-soft-secondary btn-xs rounded-pill m-1" href="#">{{ $v->category }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-5 col-lg-4">
                <form method="GET" action="{{ route('product.index') }}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search project"
                            aria-label="Search project" name="search">
                        <button type="submit" class="btn btn-primary"><i class="bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-7">
            @foreach ($product as $k => $v)
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="shape-container">
                        <img class="card-img-top" src="{{ asset('storage/'.$v->image) }}" alt="Image Description">
                        <div class="shape shape-bottom zi-1" style="margin-bottom: -.25rem">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
                                <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">
                            <a class="text-dark" href="{{ route('product.show', $v->slug) }}">{{ ucfirst($v->title) }}</a>
                        </h3>
                        <div class="card-text">{{ ucfirst(Str::limit($v->description, 300)) }}</div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-end">
                                    <p class="card-text">
                                        {{ \Carbon\Carbon::parse($v->created_at)->format('d/m/Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- End Row -->

        <!-- Pagination -->
        {!! $product->links() !!}
        <!-- End Pagination -->
    </div>
</main>
@endsection
