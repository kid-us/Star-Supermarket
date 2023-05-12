@extends('Layout.pages')
@section('mytitle', 'Electronics')
@section('content')
    <div class="container mt-5">
        <div id="carousel" class="image carousel-m">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    @for ($i = 0; $i < count($site); $i++)
                        @if ($site[$i]->imageFor && $site[$i]->sloganFor == 'Electronics')
                            <img src="{{ asset('site/' . $site[$i]->image) }}" class="img" alt="...">
                            <div class="carousel-caption ">
                                <h3 class="mb-3 h2 bor">{{ $site[$i]->slogan }}</h3>
                                <h3 class="mb-3 h2 wave">{{ $site[$i]->slogan }}</h3>
                            </div>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
        <h5 class="border-start border-5 border-danger mt-5">&nbsp; &nbsp; Electronics
            <span class="small float-end">
                <a id="filter-link" class="cursor small fw-semibold bi bi-filter-square fs-6"> Filters</a>
            </span>
        </h5>

        <div class="my-5">
            <div class="row justify-content-center gy-5">
                @foreach ($electronics as $tech)
                    @php
                        $fdate = date('Y-m-d H:i:s');
                        $tdate = $tech->created_at;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                    @endphp

                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <div class="shadow-lg rounded product-container section-two text-center p-1 bg-fff">
                            @if ($days <= 7)
                                @if ($tech->delPrice == '' || $tech->delPrice < $tech->price || $tech->price == $tech->delPrice)
                                    <div class="row my-1 small">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                @elseif(intval((($tech->delPrice - $tech->price) * 100) / $tech->delPrice) == 0)
                                    <div class="row my-1 small g-0">
                                        <div class="col-6 offset-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                @else
                                    <div class="row my-1 small">
                                        <div class="col-6">
                                            <span class="rounded bg-danger w-25 text-light p-1 me-4">
                                                {{ intval((($tech->delPrice - $tech->price) * 100) / $tech->delPrice) . ' % off' }}
                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                        </div>
                                    </div>
                                @endif
                            @else
                                @if ($tech->delPrice == '' || $tech->delPrice == 0)
                                    <p class="py-2"></p>
                                @else
                                    <div class="row my-1 samll">
                                        <div class="col-6">
                                            <span class="rounded me-4 bg-danger w-25 text-light p-1">
                                                {{ intval((($tech->delPrice - $tech->price) * 100) / $tech->delPrice) . ' % off' }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            <img src="{{ asset("uploads/$tech->image") }}" class="mt-2 product-img" alt=""
                                width="170px">
                            <form action="/star/purchase" method="POST">
                                @csrf
                                <input type="text" name="product" value="{{ $tech->product }}" readonly hidden>
                                <input type="text" name="price" value="{{ $tech->price . "$" }}" readonly hidden>
                                <input type="text" name="delPrice" value="{{ $tech->delPrice . "$" }}" readonly hidden>
                                <input type="text" name="product-no" value="{{ $tech->productNo }}" readonly hidden>
                                <input type="text" name="category" value="{{ $tech->category }}" readonly hidden>
                                <input type="text" name="info" value="{{ $tech->description }}" readonly hidden>
                                <input type="text" name="type" value="{{ $tech->type }}" readonly hidden>
                                <input type="text" name="image" value="{{ $tech->image }}" readonly hidden>
                                <input type="text" name="quantity" value="{{ $tech->quantity }}" readonly hidden>

                                @if ($tech->quantity == '0')
                                    <p class="text-center my-2 text-light bg-danger small">Out of stock</p>
                                    <p class="fw-semibold text-center my-2">{{ $tech->product }}</p>

                                    @if ($tech->delPrice < $tech->price || $tech->delPrice === '')
                                        <h6 class="py-2"> {{ $foods->price . '$' }}
                                            <span class="small">{{ $foods->pricePer }}</span>
                                        </h6>
                                    @else
                                        <h6 class="py-2"> {{ $tech->price . '$' }}
                                            <span class="small">{{ $tech->pricePer }}</span>
                                            <span class="ms-3"> <del> {{ $tech->delPrice . '$' }} </del></span>
                                        </h6>
                                    @endif
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2" disabled> Buy
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class=" cursor fs-3 bi bi-cart4 disabled">
                                                <span data-name="{{ $tech->product }}"
                                                    data-price="{{ $tech->price . '$' }}" data-image="{{ $tech->image }}"
                                                    data-added="0" data-PN="{{ $tech->productNo }}"
                                                    data-quantity="{{ $tech->quantity }}">
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-center my-2 text-secondary small">Available (in stock)</p>
                                    <p class="fw-semibold text-center my-2">{{ $tech->product }}</p>
                                    <h6 class="py-2"> {{ $tech->price . '$' }}
                                        <span class="ms-3"> <del> {{ $tech->delPrice . '$' }} </del></span>
                                    </h6>
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2"> Buy </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="add-cart cursor fs-3 bi bi-cart4">
                                                <span data-name="{{ $tech->product }}"
                                                    data-price="{{ $tech->price . '$' }}" data-image="{{ $tech->image }}"
                                                    data-added="0" data-PN="{{ $tech->productNo }}"
                                                    data-quantity="{{ $tech->quantity }}">
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                @endif

                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="mt-5 text-center">{{ $fv->links() }}</div> --}}
        {{ $electronics->links('Pages.paginator', ['elements' => $electronics, 'tot' => $pages]) }}
    </div>
@endsection
