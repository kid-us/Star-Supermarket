@extends('Layout.dashboard')
@section('title', 'My Orders')
@section('content')
    {{-- orders --}}
    <div class="">
        @php
            $sum = 0;
        @endphp

        @for ($i = 0; $i < count($proDetails); $i++)
            @php
                $sum += $proDetails[$i][0]->price;
            @endphp
        @endfor

        <h5 id="page-is" class="bi bi-table p-2"> My Orders</h5>

        <p class="p-3">Dear our customer <span class="text-danger fs-3">{{ session('user-name') }} </span> you purchased
            <span class="text-danger fs-3">
                {{ count($proDetails) }}
            </span> products from our supermarket
            and you spend <span class="text-danger fs-3"> {{ $sum }}$</span> in our store!
            Thnak You for choosing us!
        </p>

        <div class="ordered-pro p-5 m-4 rounded section-two">
            <div class="row justify-content-center w-100">
                @if (count($proDetails) == 0)
                    <img src="{{ asset('Img/empty-cart.png') }}" class="empty-img" alt="" width="90px">
                    <h4 class="p-5"> Products not purchased yet try our products </h4>
                @endif

                @for ($i = 0; $i < count($proDetails); $i++)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-4">
                            <img src="{{ asset('uploads/' . $proDetails[$i][0]->image) }}" alt=""
                                class="order-image img-thumbnail">
                        </div>
                        <div class="col-lg-8 col-md-7 col-sm-6 col-xs-6 mt-4">
                            <h6>{{ $proDetails[$i][0]->product }}</h6>
                            <p>On: {{ date('D d M Y', strtotime($date[$i])) }}</p>
                            <p>Invoice Number: #{{ $ticket[$i] }}</->
                        </div>

                        <hr>

                        <div class="col-12">
                            <p> -> {{ $proDetails[$i][0]->description }}</p>
                            <h6>Price: {{ $proDetails[$i][0]->price }}$</h6>
                            <p>Quantity: {{ $quantity[$i] }}</p>
                            @if ($status[$i] === 0)
                                <p><span class="text-success">Status</span> : Pending... <span
                                        class="text-danger bi bi-hourglass"></span></p>
                            @elseif ($status[$i] === 1)
                                <p><span class="text-success">Status</span> : On the Way <span
                                        class="text-warning bi bi-bicycle"></span></p>
                            @else
                                <p><span class="text-success">Status</span> : Delivered <span
                                        class="text-success bi bi-check2-all"></span></p>
                            @endif
                        </div>
                    </div>

                    <hr>
                @endfor
            </div>
        </div>
    </div>
@endsection
