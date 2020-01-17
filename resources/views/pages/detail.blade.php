@extends('layouts.app')

@section('title','Detail Travel')
@section('content')
<main>
        <section class="section-details-header"></section>
        <section class="section-details-content">
            <div class="container">
                <div class="row">
                    <div class="col p-0">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    Paket Travel
                                </li>
                                <li class="breadcrumb-item active">
                                    Detail
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">
                        <h1>{{ $item->title }}</h1>
                            <p>{{ $item->location }}</p>
                            @if ($item->galleries->count())
                            <div class="gallery">
                                <div class="xzoom-container">
                                    <img src="{{Storage::url($item->galleries->first()->image)}}" class="xzoom" id="xzoom-default"
                                        xoriginal="{{Storage::url($item->galleries->first()->image)}}">
                                </div>
                                <div class="xzoom-thumbs">
                                    @foreach ($item->galleries as $gallery)
                                    <a href="{{Storage::url($gallery->image)}}">
                                        <img src="{{Storage::url($gallery->image)}}" class="xzoom-gallery" width="128"
                                            xpreview="{{Storage::url($gallery->image)}}">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <h2>Tentang WIsata</h2>
                            <p align="justify">
                                {!! $item->about !!}
                            </p>
                            <div class="features row">
                                <div class="col-md-4">
                                <img src="{{ url ('frontend/images/icon/ic_event.png')}}" alt="" class="featured-images">
                                    <div class="description">
                                        <h3>Event Tersedia</h3>
                                        <p>{{$item->featured_event}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                <img src="{{url('frontend/images/icon/ic_language.png')}}" alt="" class="featured-images">
                                    <div class="description">
                                        <h3>Bahasa</h3>
                                        <p>{{$item->language}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4 border-left">
                                <img src="{{url('frontend/images/icon/ic_foods.png')}}" alt="" class="featured-images">
                                    <div class="description">
                                        <h3>Kuliner</h3>
                                        <p>{{$item->foods}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">
                            <h2>Member yang bergabung</h2>
                            <div class="members my-2">
                            <img src="{{url('/frontend/images/member1.png')}}" class="member-image mr-1">
                                <img src="{{url('/frontend/images/member2.png')}}" class="member-image mr-1">
                                <img src="{{url('/frontend/images/member3.png')}}" class="member-image mr-1">
                                <img src="{{url('/frontend/images/member4.png')}}" class="member-image mr-1">
                                <img src="{{url('/frontend/images/member5.png')}}" class="member-image mr-1">
                            </div>
                            <hr>
                            <h2>Informasi Trip</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Tangal Keberangkatan</th>
                                    <td width="50%">
                                        {{\Carbon\Carbon::create($item->date_of_departure)->format('F n, Y')}}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Durasi</th>
                                    <td width="50%">
                                        {{$item->duration}}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Tipe</th>
                                    <td width="50%">
                                            {{$item->type}}
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Harga</th>
                                    <td width="50%">
                                        Rp. {{number_format($item->price)}},00/Orang
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="join-container">
                            @auth
                                <form action="{{route('checkout_process', $item->id)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-block btn-join-now mt-3 py-2" type="submit">
                                        Bergabung
                                    </button>
                                </form>
                            @endauth

                            @guest
                            <a href="{{route('login')}}" class="btn btn-block btn-join-now mt-3 py-2">
                                Login/Register
                            </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css')}}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.xzoom, .xzoom-gallery').xzoom({
            zoomWidth: 500,
            title: false,
            tint: '#333',
            xoffset: 15
        });
    });
</script>
@endpush