<!-- Spinner Start -->
<div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->

<!-- Navbar start -->
<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">{{ trans('Website/Website.address') }}</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">ClickShop@gmail.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">{{ trans('Website/Website.privacy_policy') }}</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">{{ trans('Website/Website.terms_of_use') }}</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">{{ trans('Website/Website.sales') }}</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">{{ trans('Website/Website.name_website') }}</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.html" class="nav-item nav-link active">{{ trans('Website/Website.home') }}</a>
                    <a href="shop.html" class="nav-item nav-link">{{ trans('Website/Website.shop') }}</a>
                    <a href="shop-detail.html" class="nav-item nav-link">{{ trans('Website/Website.shop_detail') }}</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ trans('Website/Website.pages') }}</a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            <a href="{{ asset('WebSite/cart.blade') }}" class="dropdown-item">{{ trans('Website/Website.cart') }}</a>
                            <a href="blank.blade" class="dropdown-item">{{ trans('Website/Website.checkout') }}</a>
                            <a href="testimonial.html" class="dropdown-item">{{ trans('Website/Website.testimonial') }}</a>
                            <a href="404.html" class="dropdown-item">{{ trans('Website/Website.404_page') }}</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">{{ trans('Website/Website.contact') }}</a>
                </div>
                <div class="nav-item dropdown">                    
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fas fa-lang fa-2x"></i>
                            @if (App::getLocale() == 'ar')
                            <strong class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                            @else
                            <strong class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                            @endif
                        </a>
                        <div class="dropdown-menu m-0 bg-secondary rounded-0">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)                            
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    @if($properties['native'] == "English")
                                    <i class="flag-icon flag-icon-us"></i>
                                    @elseif($properties['native'] == "العربية")
                                    <i class="flag-icon flag-icon-eg"></i>
                                    @endif
                                    {{ $properties['native'] }}
                                </a>
                            
                            @endforeach
                        </div>
                    </li>
                </div>
                <div class="d-flex m-3 me-0">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                    <a href="#" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1" style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                    </a>
                    <a href="{{route('admin.dashboard')}}" title="{{ trans('Website/Website.login') }}" class="my-auto">
                        <i class="fas fa-user fa-2x"></i>
                    </a>

                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->
