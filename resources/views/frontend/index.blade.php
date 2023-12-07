@extends('layouts.frontend')
@section('main')
    <!-- main-area -->
    <main>
        @foreach ($banner as $banner)
            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am {{ auth()->user()->name }}</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s">​{{ $banner->banner_description }}</p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        @foreach ($socials as $social)
                                            <li><a href="{{ $social->social_media_link }}"><i
                                                        class="{{ $social->social_media_icon }}"></i></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <img src="{{ asset('uploads/banner_images') }}/{{ $banner->banner_image }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="{{ asset('frontend-aasets') }}/img/shape/dot_circle.png"
                        class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->
        @endforeach


        <!-- about-area-->
        <section id="about" class="about-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="{{ asset('frontend-aasets') }}/img/banner/banner_img2.png" title="me-01"
                                alt="me-01">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-90">
                        <div class="section-title mb-25">
                            <span>Introduction</span>
                            <h2>About Me</h2>
                        </div>
                        <div class="about-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, sed repudiandae odit
                                deserunt, quas
                                quibusdam necessitatibus nesciunt eligendi esse sit non reprehenderit quisquam asperiores
                                maxime
                                blanditiis culpa vitae velit. Numquam!</p>
                            <h3>Education:</h3>
                        </div>
                        @foreach ($educations as $edu)
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year">{{ $edu->year }}</div>
                                <div class="line"></div>
                                <div class="location">
                                    <span>{{ $edu->degree_name }}</span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s"
                                                data-wow-duration="2s" role="progressbar"
                                                style="width: {{ $edu->skill }}%;" aria-valuenow="65" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Education Item -->
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- Services-area -->
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="{{ $service->service_icon }}"></i>
                                <h3>{{ $service->service_name }}</h3>
                                <p>
                                    {{ $service->service_description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Services-area-end -->

        <!-- Portfolios-area -->
        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($portfolios as $port)
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
                                <div class="speaker-thumb">
                                    <img src="{{ asset('uploads/portfolio_images') }}/{{ $port->portfolio_image }}"
                                        alt="img">
                                </div>
                                <div class="speaker-overlay">
                                    <span>{{ $port->category }}</span>
                                    <h4><a href="portfolio-single.html">{{ $port->portfolio_name }}</a></h4>
                                    <a href="{{ route('portfolio_page', $port->id) }}" class="arrow-btn">More information
                                        <span></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- services-area-end -->


        <!-- fact-area -->
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">
                        @foreach ($facts as $fact)
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="{{ $fact->fact_icon }}"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count">{{ $fact->fact_number }}</span></h2>
                                        <span>{{ $fact->fact_name }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">

                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">
                            @foreach ($testimonials as $testi)
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        @if ($testi->customer_image)
                                            <img src="{{ asset('uploads/customer_images') }}/{{ $testi->customer_image }}"
                                                alt="img">
                                        @else
                                            <img src="{{ asset('dashboard-assets') }}/images/default_profile.png"
                                                alt="img">
                                        @endif
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span>{{ $testi->customer_feedback }}<span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5>{{ $testi->customer_name }}</h5>
                                            <span>head of idea</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- brand-area -->
        <div class="barnd-area pt-100 pb-100">
            <div class="container">
                <div class="row brand-active">
                    @foreach ($brands as $brand)
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="{{ asset('uploads/brand_images') }}/{{ $brand->brand_image }}" alt="img">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <div class="contact-content">
                            <p>{{ $contact_info->contact_description }}</p>
                            <h5>OFFICE IN <span>{{ $city }}</span></h5>
                            <div class="contact-list">
                                <ul>
                                    <li><i class="fas fa-map-marker"></i><span>Address
                                            :</span>{{ $contact_info->address }}</li>
                                    <li><i class="fas fa-headphones"></i><span>Phone :</span>{{ $contact_info->phone }}
                                    </li>
                                    <li><i class="fas fa-globe-asia"></i><span>e-mail :</span>{{ $contact_info->email }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form action="{{ route('contact_email') }}" method="POST">
                                @csrf
                                <input type="text" placeholder="your name *" name="name">
                                @error('name')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                                <input type="email" placeholder="your email *" name="email">
                                @error('email')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                                <textarea name="message" id="message" placeholder="your message *" name="message"></textarea>
                                @error('message')
                                    <div class="text text-danger">{{ $message }}</div>
                                @enderror
                                <button type="submit" class="btn">SEND</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->
@endsection
