<footer class="bg-dark">
    <div class="container pb-1 pb-lg-5">
      <div class="row content-space-t-2">
        <div class="col-lg-3 mb-7 mb-lg-0">
          <div class="mb-5">
            <a class="navbar-brand" href="index.html" aria-label="Space">
              <img class="navbar-brand-logo" src="{{ $content['footer']['logo'] }}" alt="Image Description">
            </a>
          </div>
          <ul class="list-unstyled list-py-1">
            <li><a class="link-sm link-light" href="#"><i class="bi-geo-alt-fill me-1"></i> {{ $content['footer']['address'] }}</a></li>
            <li><a class="link-sm link-light" href="tel:1-062-109-9222"><i class="bi-telephone-inbound-fill me-1"></i>{{ $content['footer']['phone'] }}</a></li>
          </ul>
        </div>
        @foreach ($content['footer']['menu'] as $k)
        <div class="col-sm mb-7 mb-sm-0">
          <h5 class="text-white mb-3">{{ ucfirst($k['name-group']) }}</h5>
          <ul class="list-unstyled list-py-1 mb-0">
            @foreach ($k['child-menu'] as $v)
            <li><a class="link-sm link-light" href="{{ $v['link'] }}">{{ ucfirst($v['name']) }}</a></li>
            @endforeach
          </ul>
        </div>
        @endforeach
      </div>
      <div class="border-top border-white-10 my-7"></div>
      <div class="row mb-7">
        <div class="col-sm mb-3 mb-sm-0">
          <ul class="list-inline list-separator list-separator-light mb-0">
            @foreach ($content['footer']['footer-three-1'] as $k)
            <li class="list-inline-item"><a class="link-sm link-light" href="{{ $k['link'] }}">{{ ucfirst($k['name']) }}</a></li>
            @endforeach
          </ul>
        </div>
        <div class="col-sm-auto">
          <ul class="list-inline mb-0">
            @foreach ($content['footer']['footer-three-2'] as $k)
            <li class="list-inline-item">
              <a class="btn btn-soft-light btn-xs btn-icon" href="{{ $k['link'] }}">
                <i class="{{ $k['icon'] }}"></i>
              </a>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="w-md-85 text-lg-center mx-lg-auto">
        @foreach ($content['footer']['footer-three-3'] as $k)
        <p class="text-white-50 small">{{ $k }}</p>
        @endforeach
      </div>
    </div>
  </footer>