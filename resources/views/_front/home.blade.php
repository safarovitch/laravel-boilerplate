@extends('_front.layout')
@section('content')

<div class="filter-search-area my-5 py-5">
    <div class="container">
        <form>
            <div class="p-5 bg-light rounded-5">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <label>Кому?</label>
                        <select class="js-select" name="whom">
                            <option>Выбирайте</option>
                            <option>Женщине</option>
                            <option>Мужчине</option>
                            <option>Другу</option>
                            <option>Sevgiliye</option>
                            <option>Для себя</option>
                            <option>Супругу</option>
                            <option>Брату</option>
                            <option>Маме</option>
                            <option>Отцу</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-5">
                        <label>Какой подарок</label>
                        <select class="js-select" name="reason">
                            <option value="erkege-hediye">Выбирайте</option>
                            <option value="erkege-dogum-gunu-hediyesi">День рождения</option>
                            <option value="icimden-geldi?fn%5B1%5D=6">İçimden Geldi</option>
                            <option value="kisiye-ozel-hediyeler?fn%5B1%5D=6">Персональный</option>
                            <option value="hatiralik-hediyeler?fn%5B1%5D=6">Сувенир</option>
                            <option value="ilginc-hediyeler?fn%5B1%5D=6">Интересный</option>
                            <option value="romantik-hediyeler?fn%5B1%5D=6">Романтический</option>
                            <option value="yeni-is-hediyeleri?fn%5B1%5D=6">Деловые подарки</option>
                            <option value="erkege-yildonumu-hediyesi">Годовщина</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-2">
                        <button class="btn btn-lg btn-primary fs-4 h-50 pb-5 pt-3 mt-5">Найти подарок</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service1.png')}}" alt="Service">
                    </div>
                    <h6 class="title">Fast &amp; Secure Delivery</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service2.png')}}" alt="Service">
                    </div>
                    <h6 class="title">100% Guarantee On Product</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service3.png')}}" alt="Service">
                    </div>
                    <h6 class="title">24 Hour Return Policy</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service4.png')}}" alt="Service">
                    </div>
                    <h6 class="title">24 Hour Return Policy</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service5.png')}}" alt="Service">
                    </div>
                    <h6 class="title">Next Level Pro Quality</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service1.png')}}" alt="Service">
                    </div>
                    <h6 class="title">Fast &amp; Secure Delivery</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service2.png')}}" alt="Service">
                    </div>
                    <h6 class="title">100% Guarantee On Product</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service3.png')}}" alt="Service">
                    </div>
                    <h6 class="title">24 Hour Return Policy</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service4.png')}}" alt="Service">
                    </div>
                    <h6 class="title">24 Hour Return Policy</h6>
                </div>
            </div>
            <div class="col">
                <div class="service-box">
                    <div class="icon">
                        <img src="{{asset('_front/assets/images/icons/service5.png')}}" alt="Service">
                    </div>
                    <h6 class="title">Next Level Pro Quality</h6>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start New Arrivals Product Area  -->
<div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
    <div class="container ml--xxl-0">
        <div class="product-area pb--50">
            <div class="section-title-wrapper">
                <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> This
                    Week’s</span>
                <h2 class="title">New Arrivals</h2>
            </div>
            <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                <div class="slick-single-layout">
                    <div class="axil-product product-style-four">
                        <div class="thumbnail">
                            <a href="{{route('product', 1)}}">
                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                    src="{{asset('_front/assets/images/product/fashion/product-1.png')}}"
                                    alt="Product Images">
                                <img class="hover-img"
                                    src="{{asset('_front/assets/images/product/fashion/product-4.png')}}"
                                    alt="Product Images">
                            </a>
                            <div class="label-block label-right">
                                <div class="product-badget">20% OFF</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{route('product', 1)}}">Top Handle Handbag</a></h5>
                                <div class="product-price-variant">
                                    <span class="price old-price">$80</span>
                                    <span class="price current-price">$60</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="axil-product product-style-four">
                        <div class="thumbnail">
                            <a href="{{route('product', 1)}}">
                                <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                    src="{{asset('_front/assets/images/product/fashion/product-2.png')}}"
                                    alt="Product Images">
                                <img class="hover-img"
                                    src="{{asset('_front/assets/images/product/fashion/product-6.png')}}"
                                    alt="Product Images">
                            </a>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{route('product', 1)}}">Leather Bag For Men</a></h5>
                                <div class="product-price-variant">
                                    <span class="price old-price">$40</span>
                                    <span class="price current-price">$40</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="axil-product product-style-four">
                        <div class="thumbnail">
                            <a href="{{route('product', 1)}}">
                                <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                    src="{{asset('_front/assets/images/product/fashion/product-3.png')}}"
                                    alt="Product Images">
                            </a>
                            <div class="label-block label-right">
                                <div class="product-badget">15% OFF</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{route('product', 1)}}">Long Sleeve Sweater</a></h5>
                                <div class="product-price-variant">
                                    <span class="price old-price">$30</span>
                                    <span class="price current-price">$24</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="axil-product product-style-four">
                        <div class="thumbnail">
                            <a href="{{route('product', 1)}}">
                                <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                    src="{{asset('_front/assets/images/product/fashion/product-4.png')}}"
                                    alt="Product Images">
                            </a>
                            <div class="label-block label-right">
                                <div class="product-badget">30% OFF</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{route('product', 1)}}">Men's Winter Jacket</a></h5>
                                <div class="product-price-variant">
                                    <span class="price old-price">$50</span>
                                    <span class="price current-price">$40</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="axil-product product-style-four">
                        <div class="thumbnail">
                            <a href="{{route('product', 1)}}">
                                <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                    src="{{asset('_front/assets/images/product/fashion/product-5.png')}}"
                                    alt="Product Images">
                            </a>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{route('product', 1)}}">Micro Fiber Sheet</a></h5>
                                <div class="product-price-variant">
                                    <span class="price old-price">$60</span>
                                    <span class="price current-price">$50</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="axil-product product-style-four">
                        <div class="thumbnail">
                            <a href="{{route('product', 1)}}">
                                <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                    src="{{asset('_front/assets/images/product/fashion/product-3.png')}}"
                                    alt="Product Images">
                            </a>
                            <div class="label-block label-right">
                                <div class="product-badget">15% OFF</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{route('product', 1)}}">Long Sleeve Sweater</a></h5>
                                <div class="product-price-variant">
                                    <span class="price old-price">$30</span>
                                    <span class="price current-price">$24</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="axil-product product-style-four">
                        <div class="thumbnail">
                            <a href="{{route('product', 1)}}">
                                <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                    src="{{asset('_front/assets/images/product/fashion/product-4.png')}}"
                                    alt="Product Images">
                            </a>
                            <div class="label-block label-right">
                                <div class="product-badget">30% OFF</div>
                            </div>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{route('product', 1)}}">Men's Winter Jacket</a></h5>
                                <div class="product-price-variant">
                                    <span class="price old-price">$50</span>
                                    <span class="price current-price">$40</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .slick-single-layout -->
                <div class="slick-single-layout">
                    <div class="axil-product product-style-four">
                        <div class="thumbnail">
                            <a href="{{route('product', 1)}}">
                                <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                    src="{{asset('_front/assets/images/product/fashion/product-5.png')}}"
                                    alt="Product Images">
                            </a>
                            <div class="product-hover-action">
                                <ul class="cart-action">
                                    <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                    <li class="quickview"><a href="#" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <div class="inner">
                                <h5 class="title"><a href="{{route('product', 1)}}">Micro Fiber Sheet</a></h5>
                                <div class="product-price-variant">
                                    <span class="price old-price">$60</span>
                                    <span class="price current-price">$50</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .slick-single-layout -->
            </div>
        </div>
    </div>
</div>
<!-- End New Arrivals Product Area  -->

<!-- Start Best Sellers Product Area  -->
<div class="axil-best-seller-product-area bg-color-white axil-section-gap pb--50 pb_sm--30">
    <div class="container">
        <div class="section-title-wrapper">
            <span class="title-highlighter highlighter-secondary"><i class="far fa-shopping-basket"></i>This
                Month</span>
            <h2 class="title">Best Sellers</h2>
        </div>
        <div
            class="new-arrivals-product-activation-2 product-transparent-layout slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">
            <div class="slick-single-layout">
                <div class="axil-product product-style-seven">
                    <div class="product-content">
                        <div class="cart-btn">
                            <a href="cart.html">
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="inner">
                            <h5 class="title"><a href="{{route('product', 1)}}">Full Sleev Tshirt</a></h5>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(64)</span>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail">
                        <a href="{{route('product', 1)}}">
                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy"
                                src="{{asset('_front/assets/images/product/fashion/product-16.png')}}"
                                alt="Product Images">
                        </a>
                    </div>
                </div>
            </div>
            <div class="slick-single-layout">
                <div class="axil-product product-style-seven">
                    <div class="product-content">
                        <div class="cart-btn">
                            <a href="cart.html">
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="inner">
                            <h5 class="title"><a href="{{route('product', 1)}}">Comfort Unisex Hoddie</a></h5>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(44)</span>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail">
                        <a href="{{route('product', 1)}}">
                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy"
                                src="{{asset('_front/assets/images/product/fashion/product-17.png')}}"
                                alt="Product Images">
                        </a>
                    </div>
                </div>
            </div>
            <div class="slick-single-layout">
                <div class="axil-product product-style-seven">
                    <div class="product-content">
                        <div class="cart-btn">
                            <a href="cart.html">
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="inner">
                            <h5 class="title"><a href="{{route('product', 1)}}">Stylish Hoddie</a></h5>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(60)</span>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail">
                        <a href="{{route('product', 1)}}">
                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy"
                                src="{{asset('_front/assets/images/product/fashion/product-18.png')}}"
                                alt="Product Images">
                        </a>
                    </div>
                </div>
            </div>
            <div class="slick-single-layout">
                <div class="axil-product product-style-seven">
                    <div class="product-content">
                        <div class="cart-btn">
                            <a href="cart.html">
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="inner">
                            <h5 class="title"><a href="{{route('product', 1)}}">Sky Blue T-shirt</a></h5>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(22)</span>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail">
                        <a href="{{route('product', 1)}}">
                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy"
                                src="{{asset('_front/assets/images/product/fashion/product-19.png')}}"
                                alt="Product Images">
                        </a>
                    </div>
                </div>
            </div>
            <div class="slick-single-layout">
                <div class="axil-product product-style-seven">
                    <div class="product-content">
                        <div class="cart-btn">
                            <a href="cart.html">
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="inner">
                            <h5 class="title"><a href="{{route('product', 1)}}">Modern Hoddie</a></h5>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(64)</span>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail">
                        <a href="{{route('product', 1)}}">
                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy"
                                src="{{asset('_front/assets/images/product/fashion/product-20.png')}}"
                                alt="Product Images">
                        </a>
                    </div>
                </div>
            </div>
            <div class="slick-single-layout">
                <div class="axil-product product-style-seven">
                    <div class="product-content">
                        <div class="cart-btn">
                            <a href="cart.html">
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="inner">
                            <h5 class="title"><a href="{{route('product', 1)}}">Blue T-shirt</a></h5>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(14)</span>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail">
                        <a href="{{route('product', 1)}}">
                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy"
                                src="{{asset('_front/assets/images/product/fashion/product-21.png')}}"
                                alt="Product Images">
                        </a>
                    </div>
                </div>
            </div>
            <div class="slick-single-layout">
                <div class="axil-product product-style-seven">
                    <div class="product-content">
                        <div class="cart-btn">
                            <a href="cart.html">
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="inner">
                            <h5 class="title"><a href="{{route('product', 1)}}">Men's Full Sleev T-shirt</a></h5>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(64)</span>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail">
                        <a href="{{route('product', 1)}}">
                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy"
                                src="{{asset('_front/assets/images/product/fashion/product-22.png')}}"
                                alt="Product Images">
                        </a>
                    </div>
                </div>
            </div>
            <div class="slick-single-layout">
                <div class="axil-product product-style-seven">
                    <div class="product-content">
                        <div class="cart-btn">
                            <a href="cart.html">
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </div>
                        <div class="inner">
                            <h5 class="title"><a href="{{route('product', 1)}}">Men's Half Sleev T-shirt</a></h5>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-rating">
                                <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                <span class="rating-number">(94)</span>
                            </div>
                        </div>
                    </div>
                    <div class="thumbnail">
                        <a href="{{route('product', 1)}}">
                            <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy"
                                src="{{asset('_front/assets/images/product/fashion/product-23.png')}}"
                                alt="Product Images">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End  Best Sellers Product Area  -->

<!-- Poster Countdown Area  -->
<div class="axil-poster-countdown">
    <div class="container">
        <div class="poster-countdown-wrap bg-lighter">
            <div class="row">
                <div class="col-xl-5 col-lg-6">
                    <div class="poster-countdown-content">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-secondary"> <i
                                    class="far fa-shopping-basket"></i> Don’t Miss!!</span>
                            <h2 class="title">Let's Shopping Today</h2>
                        </div>
                        <div class="poster-countdown countdown mb--40"></div>
                        <a href="#" class="axil-btn btn-bg-primary">Check it Out!</a>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="poster-countdown-thumbnail">
                        <img src="{{asset('_front/assets/images/product/poster/poster-05.png')}}" alt="Poster Product">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Poster Countdown Area  -->

<!-- Start Expolre Product Area  -->
<div class="axil-product-area bg-color-white axil-section-gap">
    <div class="container">
        <div class="section-title-wrapper">
            <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i> Our
                Products</span>
            <h2 class="title">Explore our Products</h2>
        </div>
        <div
            class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
            <div class="slick-single-layout">
                <div class="row row--15">
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="{{asset('_front/assets/images/product/fashion/product-8.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Leather Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.99</span>
                                        <span class="price old-price">$49.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                        src="{{asset('_front/assets/images/product/fashion/product-7.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="{{route('product', 1)}}">Select
                                                Option</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Men's Stylish Hat</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$25.00</span>
                                        <span class="price old-price">$35.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                        src="{{asset('_front/assets/images/product/fashion/product-6.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Women's Stylish Hat</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.99</span>
                                        <span class="price old-price">$49.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                        src="{{asset('_front/assets/images/product/fashion/product-5.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Solid A Line Dress</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$100.00</span>
                                        <span class="price old-price">$150.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="{{asset('_front/assets/images/product/fashion/product-4.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Denim Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$50.00</span>
                                        <span class="price old-price">$89.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                        src="{{asset('_front/assets/images/product/fashion/product-3.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Leather Bag</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$99.99</span>
                                        <span class="price old-price">$149.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                        src="{{asset('_front/assets/images/product/fashion/product-2.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="{{route('product', 1)}}">Select
                                                Option</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Women's Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.99</span>
                                        <span class="price old-price">$49.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                        src="{{asset('_front/assets/images/product/fashion/product-1.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Men's Tshirt</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.99</span>
                                        <span class="price old-price">$39.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->

                </div>
            </div>
            <!-- End .slick-single-layout -->
            <div class="slick-single-layout">
                <div class="row row--15">
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img src="{{asset('_front/assets/images/product/fashion/product-8.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Leather Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.99</span>
                                        <span class="price old-price">$49.99</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img src="{{asset('_front/assets/images/product/fashion/product-7.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="{{route('product', 1)}}">Select
                                                Option</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Men's Stylish Hat</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$25.00</span>
                                        <span class="price old-price">$35.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img src="{{asset('_front/assets/images/product/fashion/product-6.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Women's Stylish Hat</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.99</span>
                                        <span class="price old-price">$49.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img src="{{asset('_front/assets/images/product/fashion/product-5.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Solid A Line Dress</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$100.00</span>
                                        <span class="price old-price">$150.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img src="{{asset('_front/assets/images/product/fashion/product-4.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Denim Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$50.00</span>
                                        <span class="price old-price">$89.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img src="{{asset('_front/assets/images/product/fashion/product-3.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Leather Bag</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$99.99</span>
                                        <span class="price old-price">$149.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img src="{{asset('_front/assets/images/product/fashion/product-2.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="{{route('product', 1)}}">Select
                                                Option</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Women's Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.99</span>
                                        <span class="price old-price">$49.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                        <div class="axil-product product-style-one">
                            <div class="thumbnail">
                                <a href="{{route('product', 1)}}">
                                    <img src="{{asset('_front/assets/images/product/fashion/product-1.png')}}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">20% Off</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{route('product', 1)}}">Men's Tshirt</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.99</span>
                                        <span class="price old-price">$39.99</span>
                                    </div>
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product  -->

                </div>
            </div>
            <!-- End .slick-single-layout -->
        </div>
        <div class="row">
            <div class="col-lg-12 text-center mt--20 mt_sm--0">
                <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
            </div>
        </div>

    </div>
</div>
<!-- End Expolre Product Area  -->

@endsection