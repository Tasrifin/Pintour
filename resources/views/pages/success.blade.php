@extends('layouts.checkout')

@section('title','Checkout Success')

@section('content')

<main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
            <img src="{{ url('frontend/images/icon/ic_mail.png')}}" alt="">
                <h1>Yeay! Berhasil</h1>
                <p>
                    Kami akan segera mengirimkan email untuk instruksi perjalanan
                    <br />
                    silahkan dibaca dengan seksama, ya!
                </p>
                <a href="/" class="btn btn-homepage mt-3 px-5">
                    Halaman Awal
                </a>
            </div>
        </div>
    </main>
@endsection