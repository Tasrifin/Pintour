@extends('layouts.app')

@section('title','PINTOUR')

@section('content')

<!-- header -->
<header class="text-center">
        <h1>Telusuri Pesona Indonesia
            <br>Dalam Satu Genggaman</h1>
        <p class="mt-3">
            Kamu akan melihat momen cantik
            <br>yang tak pernah ada sebelumnya
        </p>
        <a href="#popular" class="btn btn-get-started px-4 mt-4">Get started</a>
    </header>

    <!-- main -->
    <main>
        <div class="container">
            <section class="section-stats row justify-content-center" id="statistc">
                <div class="col-3 col-md-2 stats-detail ">
                    <h2>17K</h2>
                    <p>Members</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>10</h2>
                    <p>Countries</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>72</h2>
                    <p>Partners</p>
                </div>
                <div class="col-3 col-md-2 stats-detail">
                    <h2>4K</h2>
                    <p>Hotels</p>
                </div>
            </section>
        </div>

        <section class="section-popular" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col text-center section-popular-heading">
                        <h2>Wisata Poluper</h2>
                        <p>Nikmati destinasi surga
                            <br>yang tersembunyi</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- popular -->
        <section class="section-popular-content" id="popularContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    @foreach ($items as $item)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="card-travel text-center d-flex flex-column"
                        style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) :'' }}');">
                                <div class="travel-country">{{$item->location}}</div>
                                <div class="travel-location">{{$item->title}}</div>
                                <div class="travel-button mt-auto">
                                <a href="{{ route('detail', $item->slug)}}" class="btn btn-travel-details">View Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- network -->
        <section class="section-networks" id="partners">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h2>Partner Kami</h2>
                        <p>
                            lebih dari sebuah ekspedisi
                        </p>
                    </div>
                    <div class="col-md-8 text-center">
                        <img src="frontend/images/logos_partner.png" alt="Logo Partner" class="img-partner">
                    </div>
                </div>
            </div>

        </section>

        <!-- Testimonial -->
        <section class="section-testimonial-heading" id="testimonials">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Mereka Menyukai Kami</h2>
                        <p>
                            Momen ketika kami memberikan
                            <br>pengalaman terbaik
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonial Conetnt-->
        <section class="section section-testimonial-content" id="testimonialContent">
            <div class="container">
                <div class="section-popular-travel row justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testi2.png" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Aurel</h3>
                                <p class="testimonial">
                                    “ It was glorious and I could
                                    not stop to say wohooo for
                                    every single moment
                                    Dankeeeeee “
                                </p>
                                <hr />
                                <p class="trip-to mt-2">
                                    Trip To Jogja
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testi3.png" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Megan</h3>
                                <p class="testimonial">
                                    “ The trip was amazing and
                                    I saw something beautiful in
                                    that Island that makes me
                                    want to learn more “
                                </p>
                                <hr />
                                <p class="trip-to mt-2">
                                    Trip To Bali
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card card-testimonial text-center">
                            <div class="testimonial-content">
                                <img src="frontend/images/testi2.png" alt="User" class="mb-4 rounded-circle">
                                <h3 class="mb-4">Aurel</h3>
                                <p class="testimonial">
                                    “ I loved it when the waves
                                    was shaking harder — I was
                                    scared too “
                                </p>
                                <hr />
                                <p class="trip-to mt-2">
                                    Trip To Lombok
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">Bantuan</a>
                    <a href="{{route('register')}}" class="btn btn-get-started px-4 mt-4 mx-1">Mulai Sekarang</a>
                    </div>
                </div>
            </div>
        </section>

    </main>
    
@endsection