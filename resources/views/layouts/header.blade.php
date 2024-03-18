<header id="header"
    class="navbar navbar-expand-lg navbar-end navbar-absolute-top navbar-@yield('dark') navbar-show-hide"
    data-hs-header-options='{"fixMoment": 1000,"fixEffect": "slide"}'>
    <div class="container">
        <nav class="js-mega-menu navbar-nav-wrap">
            <a class="navbar-brand" href="index.html" aria-label="Front">
                @php
                    $logo = trim($__env->yieldContent('dark')) == 'dark' ? 'LOGO-SAS-01.svg' : 'LOGO-SAS-02.svg';
                @endphp
                <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/' . $logo) }}" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-default">
                    <i class="bi-list"></i>
                </span>
                <span class="navbar-toggler-toggled">
                    <i class="bi-x"></i>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="navbar-absolute-top-scroller">
                    <ul class="navbar-nav">
                        @foreach ($content['header']['main-menu'] as $k)
                            <li class="hs-has-mega-menu nav-item">
                                <a id="landingsMegaMenu" class="hs-mega-menu-invoker nav-link"
                                    href="{{ $k['link'] }}" role="button"
                                    aria-expanded="false">{{ ucfirst($k['name']) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
