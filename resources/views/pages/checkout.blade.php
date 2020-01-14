@extends('layouts.checkout')

@section('title','Checkout')

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
                                <li class="breadcrumb-item">
                                    Detail
                                </li>
                                <li class="breadcrumb-item active">
                                    Checkout
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 pl-lg-0">
                        <div class="card card-details">

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors as $error)
                                     <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <h1>Siapa yang Bergabung ? </h1>
                            <p>Trip ke {{$item->travel_package->title}},{{$item->travel_package->location}}</p>
                            <div class="attendee">
                                <table class="table table-responsive-sm text-center">
                                    <thead>
                                        <tr>
                                            <td>Foto</td>
                                            <td>Nama</td>
                                            <td>Kewarganegaraan</td>
                                            <td>Visa</td>
                                            <td>Passport</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->details as $detail)
                                        <tr>
                                            <td>
                                            <img src="https://ui-avatars.com/api/?name={{$detail->username}}" height="60" class="rounded-circle">
                                            </td>
                                            <td class="align-middle">{{$detail->username}}</td>
                                            <td class="align-middle">{{$detail->nationality}}</td>
                                            <td class="align-middle">{{$detail->is_visa? '30 Hari' : 'N/A'}}</td>
                                            <td class="align-middle">{{\Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now()? 'Active' : 'Inactive'}}</td>
                                            <td class="align-middle"><a href="{{route('checkout-remove', $detail->id)}}"><img
                                            src="{{url('frontend/images/icon/ic_remove.png')}}"></img></a>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">
                                                    No Visitor
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="member mt-3">
                                <h2>Tambah Anggota</h2>
                                <form class="form-inline" method="POST" action="{{route('checkout-create', $item->id)}}">
                                    @csrf
                                    <label for="username" class="sr-only">Nama</label>
                                    <input 
                                        type="text" 
                                        name="username" 
                                        class="form-control mb-2 mr-sm2"
                                        id="username" 
                                        required
                                        placeholder="Nama"/>

                                    <label for="nationality" class="sr-only">Kewarganegaraan</label>
                                    <input 
                                        type="text" 
                                        name="nationality" 
                                        class="form-control mb-2 mr-sm2" 
                                        style="width:50px"
                                        id="nationality"
                                        required
                                        placeholder="Kewarganegaraan"/>

                                    <label for="is_visa" class="sr-only">Visa</label>
                                    <select name="is_visa" id="is_visa" required class="custom-select mb-2 mr-sm-2">
                                        <option value="" selected>VISA</option>
                                        <option value="1">30 Hari</option>
                                        <option value="0">N/A</option>
                                    </select>

                                    <label for="doe_passport" class="sr-only">DOE Passport</label>
                                    <div class="input-group mb-2 mr-sm-2">
                                        <input 
                                            type="text" 
                                            class="form-control datepicker" 
                                            id="doe_passport"
                                            name="doe_passport"
                                            placeholder="DOE Passport"
                                            />
                                    </div>

                                    <button type="submit" class="btn btn-add-now mb-2 px-4">Tambahkan</button>
                                </form>
                                <h3 class="mt-2 mb-o">Catatan</h3>
                                <p class="disclaimer mb-0">Kamu hanya bisa menambahkan anggota yang sudah melakukan
                                    registrasi di
                                    Pintour</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card card-details card-right">

                            <h2>Informasi Pembayaran</h2>
                            <table class="trip-informations">
                                <tr>
                                    <th width="50%">Anggota</th>
                                    <td width="50%" class="text-right">
                                        {{$item->details->count()}} Orang
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">VISA Tambahan</th>
                                    <td width="50%" class="text-right">
                                        Rp. {{number_format($item->additional_visa)}},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Biaya Perjalanan</th>
                                    <td width="50%" class="text-right">
                                       Rp. {{number_format($item->travel_package->price)}},00 / Orang
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Subtotal</th>
                                    <td width="50%" class="text-right">
                                       Rp. {{number_format($item->transaction_total)}},00
                                    </td>
                                </tr>
                                <tr>
                                    <th width="50%">Total (+ Kode Unik)</th>
                                    <td width="50%" class="text-right">
                                        <span class="text-blue">
                                            Rp. {{number_format($item->transaction_total + mt_rand(0,1000))}},00
                                        </span>
                                    </td>
                                </tr>

                            </table>
                            <hr />
                            <h2>Instruksi Pembayaran</h2>
                            <p class="payment-instruction">
                                Silahkan selesaikan pembayaran anda sebelum melanjutkan
                            </p>
                            <div class="bank mt-3">
                                <div class="bank-item pb-3">
                                <img src="{{url('frontend/images/icon/ic_bank.png')}}" class="bank-image" alt="" />
                                    <div class="description">
                                        <h3>PT. Pintour Jaya Wisata</h3>
                                        <p>9816728145
                                            <br>Bank Central Asia
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="bank-item pb-3">
                                <img src="{{url('frontend/images/icon/ic_bank.png')}}" class="bank-image" alt="" />
                                    <div class="description">
                                        <h3>PT. Pintour Jaya Wisata</h3>
                                        <p>6801928723637
                                            <br>Bank Mandiri
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="join-container">
                        <a href="{{ route('checkout-success', $item->id)}}" class="btn btn-block btn-join-now mt-3 py-2">
                                Konfirmasi Pembayaran
                            </a>
                        </div>
                        <div class="text-center mt-3">
                            <a href="{{route('detail',$item->travel_package->slug)}}" class="text-muted">
                                Batalkan Pesanan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
@endsection

@push('prepend-style')
<link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css')}}">
@endpush

@push('addon-script')
<script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js')}}"></script>
<script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format:'yyyy-mm-dd',
                uiLibrary: 'bootstrap4',
                icons: {
                    rightIcon: '<img src="{{ url('frontend/images/icon/ic_doe.png')}}"/>'
                }
            });
        });
    </script>
@endpush