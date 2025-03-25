@extends('WebSite.master')
@section('content')

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Website/Website.search_by_keyword') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="{{ trans('Website/Website.search_placeholder') }}" aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Search End -->

<!-- Hero Start -->
<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">{{ trans('Website/Website.open_market') }}</h4>
                <h1 class="mb-5 display-3 text-primary">{{ trans('Website/Website.shop_now') }}</h1>
                <div class="position-relative mx-auto">
                    <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="{{ trans('Website/Website.search_placeholder') }}">
                    <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">{{ trans('Website/Website.submit_now') }}</button>
                </div>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="{{asset('WebSite/assets/img/landing_3.jpg')}}" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide" style="object-fit: cover;">
                            <a href="#" class="btn px-4 py-2 text-white rounded">{{ trans('Website/Website.products') }}</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="{{asset('WebSite/assets/img/landing_5.jpg')}}" class="img-fluid w-100 h-100 rounded" alt="Second slide" style="object-fit: cover;">
                            <a href="#" class="btn px-4 py-2 text-white rounded">{{ trans('Website/Website.products') }}</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="{{asset('WebSite/assets/img/landing_4.jpg')}}" class="img-fluid w-100 h-100 rounded" alt="Fourth slide" style="object-fit: cover;">
                            <a href="#" class="btn px-4 py-2 text-white rounded">{{ trans('Website/Website.sell_now') }}</a>
                        </div>
                    </div>

                    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->


<!-- Featurs Section Start -->
<div class="container-fluid featurs py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-truck fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>{{ trans('Website/Website.shipping') }}</h5>
                        <p class="mb-0">{{ trans('Website/Website.shipping_info') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-lock fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>{{ trans('Website/Website.security_payment') }}</h5>
                        <p class="mb-0">{{ trans('Website/Website.security_payment_info') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fas fa-gift fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>{{ trans('Website/Website.exclusive_offers') }}</h5>
                        <p class="mb-0">{{ trans('Website/Website.exclusive_offers_info') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="featurs-item text-center rounded bg-light p-4">
                    <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                        <i class="fa fa-headset fa-3x text-white"></i>
                    </div>
                    <div class="featurs-content text-center">
                        <h5>{{ trans('Website/Website.support') }}</h5>
                        <p class="mb-0">{{ trans('Website/Website.support_info') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Featurs Section End -->
<!-- All Category Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <div class="tab-class text-center">
            <div class="row g-4">
                <div class="col-lg-4 text-start mb-5">
                    <h1>{{ trans('Website/Website.category') }}</h1>
                </div>
                {{-- <div class="col-lg-8 text-end">
                    <ul class="nav nav-pills d-inline-flex text-center mb-5">
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                <span class="text-dark" style="width: 130px;">{{ $category->name }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div> --}}
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                @foreach($categories as $category)
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <div class="rounded position-relative fruite-item border border-secondary">
                                        <div class="fruite-img">
                                            <img src="{{asset('Dashboard/img/Category/'. $category->image->filename)}}" class="img-fluid mt-4 rounded-top" alt="">
                                        </div>
                                        <div class="p-4">
                                            <h5>{{ $category->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- All Category End-->


@endsection
