@extends('layouts.frontend')
@section('main')
            <!-- main-area -->
            <main>

                <!-- breadcrumb-area -->
                <section class="breadcrumb-area breadcrumb-bg d-flex align-items-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="breadcrumb-content text-center">
                                    <h2>{{ $port->portfolio_name }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- breadcrumb-area-end -->

                <!-- portfolio-details-area -->
                <section class="portfolio-details-area pt-120 pb-120">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-xl-9 col-lg-10">
                                <div class="single-blog-list">
                                    <div class="blog-list-thumb mb-35">
                                        <img src="{{ asset('uploads/portfolio_images') }}/{{ $port->portfolio_image }}" alt="img">
                                    </div>
                                    <div class="blog-list-content blog-details-content portfolio-details-content">
                                        <h2>{{ $port->portfolio_heading }}</h2>
                                        <p>{{ $port->portfolio_description }}</p>
                                        <div class="blog-list-meta">
                                            <ul>
                                                <li class="blog-post-date">
                                                    <h3>Share On</h3>
                                                </li>
                                                <li class="blog-post-share">
                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="avatar-post mt-70 mb-60">
                                        <ul>
                                            <li>
                                                <div class="post-avatar-img">
                                                    <img src="{{ asset('frontend-aasets') }}/img/blog/post_avatar_img.png" alt="img">
                                                </div>
                                                <div class="post-avatar-content">
                                                    <h5>Thomas Herlihy</h5>
                                                    <p>Vehicula dolor amet consectetur adipiscing elit. Cras sollicitudin, tellus vitae
                                                        condimem
                                                        egestliberos dolor auctor
                                                        tellus.</p>
                                                    <div class="post-avatar-social mt-15">
                                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                                        <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- portfolio-details-area-end -->

            </main>
            <!-- main-area-end -->
@endsection
