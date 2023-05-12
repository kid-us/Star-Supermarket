@extends('Layout.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="">
        <h5 id="page-is" class="bi bi-menu-button-wide p-2"> Overview</h5>
        <div class="row justify-content-center w-100">
            @php
                $sum = 0;
            @endphp

            @for ($i = 0; $i < count($proDetails); $i++)
                @php
                    $sum += $proDetails[$i][0]->price;
                @endphp
            @endfor

            <h5 class="display-6 my-3">Hi! {{ session('user-name') }}</h5>
            <div class="col-sm-12 col-md-12 col-lg-6 mb-4 mt-3">
                <div class="section-two p-3">
                    <h5>Your Info</h5>
                    <hr>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-mic-fill"> Name: </span>
                        {{ session('user-name') }}</p>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-envelope-fill"> Email: </span>
                        {{ session('user-email') }}</p>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-flag-fill"> Country: </span>
                        {{ session('user-country') }}</p>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-building"> City: </span>
                        {{ session('user-city') }}</p>
                    <p class="fs-5"> <span class="fs-6 text-secondary bi bi-geo-alt-fill"> Address: </span>
                        {{ session('user-address') }}
                    </p>

                    <a href="/shopify/dashboard/profile" class="small text-primary">Profile -></a>

                </div>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="section-two mt-3 p-3">
                    <h5 class="">My Orders</h5>
                    <hr>
                    <p class="fs-2">{{ count($proDetails) }}
                        Recently Purchases</p>
                    <p>
                        <span class=""> {{ count($proDetails) }} Items </span>
                        <span class="float-end">{{ $sum }}$</span>
                    </p>

                    <a href="/shopify/dashboard/orders" class="small text-primary">All Orders -></a>
                </div>
            </div>
        </div>
    @endsection
