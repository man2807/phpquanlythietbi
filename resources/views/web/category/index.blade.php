@extends('web.layouts.app')
@section('content')
    <div class="main flex">
        @include('web.layouts.menu')
        <link rel="stylesheet" href="assets/css/home.min.css">
        <div class="banner">
            <div class="container">
                <div class="owl-carousel owl-theme">
                    <div class="item"><img src="assets/img/banner1.jpg" alt="" srcset=""></div>
                    <div class="item"><img src="assets/img/banner1.jpg" alt="" srcset=""></div>
                    <div class="item"><img src="assets/img/banner1.jpg" alt="" srcset=""></div>
                    <div class="item"><img src="assets/img/banner1.jpg" alt="" srcset=""></div>
                </div>
            </div>
        </div>
        <section class="contentV1">
            <div class="container">
                <div class="her flex">
                    <h4>A. Thiết bị máy tính</h4>
                    <a class="viewal" href="">Xem thêm</a>
                </div>
                @include('admin.layouts.vndSet')
                <div class="owl-carousel owl-theme">
                    @foreach ($supplie1 as $item)
                    <div class="item">
                        @include('web/layouts.product_item')
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="contentV1">
            <div class="container">
                <h4>A.Phụ kiến máy tính</h4>
                <div class="owl-carousel owl-theme">
                    @foreach ($supplie2 as $item)
                    <div class="item">
                        @include('web/layouts.product_item')
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="contentV1">
            <div class="container">
                <h4>A. Thiết bị ngoại vi</h4>
                <div class="owl-carousel owl-theme">
                    @foreach ($supplie3 as $item)
                    <div class="item">
                        @include('web/layouts.product_item')
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection