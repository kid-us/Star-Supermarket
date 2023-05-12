@extends('Layout.pages')
@section('content')
    <div class="container carousel-m">
        <h5 class="border-start border-5 border-danger mt-5"> &nbsp; &nbsp; {{ $title }}
            <span class="small float-end">
                <a id="filter-link" href="#" class="small fw-semibold bi bi-filter-square fs-6"> Filters</a>
            </span>
        </h5>

        <div class="my-5">
            <div class="row justify-content-center gy-5">
                @foreach ($found as $type)
                    @php
                        $fdate = date('Y-m-d H:i:s');
                        $tdate = $type->created_at;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" data-aos="fade-up" data-aos-easing="linear"
                        data-aos-duration="1500">
                        <div class="shadow-lg rounded product-container section-two text-center p-1 bg-fff">
                            @if ($days <= 7)
                                <p class="my-2 small">
                                    @if ($type->delPrice == '' || $type->delPrice < $type->price || $type->price == $type->delPrice)
                                        <div class="row my-1 small g-0">
                                            <div class="col-6 offset-6">
                                                <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                            </div>
                                        </div>
                                    @elseif(intval((($type->delPrice - $type->price) * 100) / $type->delPrice) == 0)
                                        <div class="row my-1 small">
                                            <div class="col-6 offset-6">
                                                <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row my-1 small">
                                            <div class="col-6">
                                                <span class="rounded bg-danger w-25 text-light p-1 me-4">
                                                    {{ intval((($type->delPrice - $type->price) * 100) / $type->delPrice) . ' % off' }}
                                                </span>
                                            </div>
                                            <div class="col-6">
                                                <span class="small bg-success p-1 ms-5 text-light rounded">New</span>
                                            </div>
                                        </div>
                                    @endif
                                </p>
                            @else
                                @if ($type->delPrice == '' || $type->delPrice == 0)
                                    <p class="py-2"></p>
                                @else
                                    <div class="row my-1 samll">
                                        <div class="col-6">
                                            <span class="rounded me-4 bg-danger w-25 text-light p-1">
                                                {{ intval((($type->delPrice - $type->price) * 100) / $type->delPrice) . ' % off' }}
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            @endif
                            <img src="{{ asset("uploads/$type->image") }}" class="mt-2 product-img" alt=""
                                width="170px">
                            <form action="/star/purchase" method="POST">
                                @csrf
                                <input type="text" name="product" value="{{ $type->product }}" readonly hidden>
                                <input type="text" name="price" value="{{ $type->price . "$" }}" readonly hidden>
                                <input type="text" name="delPrice" value="{{ $type->delPrice . "$" }}" readonly hidden>
                                <input type="text" name="product-no" value="{{ $type->productNo }}" readonly hidden>
                                <input type="text" name="category" value="{{ $type->category }}" readonly hidden>
                                <input type="text" name="info" value="{{ $type->description }}" readonly hidden>
                                <input type="text" name="type" value="{{ $type->type }}" readonly hidden>
                                <input type="text" name="image" value="{{ $type->image }}" readonly hidden>
                                <input type="text" name="quantity" value="{{ $type->quantity }}" readonly hidden>

                                @if ($type->quantity == '0')
                                    <p class="text-center my-2 text-light bg-danger small">Out of stock</p>
                                    <p class="fw-semibold text-center my-2">{{ $type->product }}</p>
                                    @if ($type->delPrice < $type->price || $type->delPrice == '')
                                        <h6 class="py-2"> {{ $type->price . '$' }}
                                            <span class="small">{{ $type->pricePer }}</span>
                                        </h6>
                                    @else
                                        <h6 class="py-2"> {{ $type->price . '$' }}
                                            <span class="small">{{ $type->pricePer }}</span>
                                            <span class="ms-3"> <del> {{ $type->delPrice . '$' }} </del></span>
                                        </h6>
                                    @endif
                                    {{-- <h6 class="py-2"> {{ $type->price . '$' }}
                                        <span class="ms-2"> <del> {{ $type->delPrice . '$' }} </del></span>
                                    </h6> --}}

                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2" disabled> Buy
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class=" cursor fs-3 bi bi-cart4 disabled">
                                                <span data-name="{{ $type->product }}"
                                                    data-price="{{ $type->price . '$' }}" data-image="{{ $type->image }}"
                                                    data-added="0" data-PN="{{ $type->productNo }}"
                                                    data-quantity="{{ $type->quantity }}">
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-center my-2 text-secondary small">Available (in stock)</p>
                                    <p class="fw-semibold text-center my-2">{{ $type->product }}</p>
                                    @if ($type->delPrice < $type->price || $type->delPrice == '')
                                        <h6 class="py-2"> {{ $type->price . '$' }}
                                            <span class="small">{{ $type->pricePer }}</span>
                                        </h6>
                                    @else
                                        <h6 class="py-2"> {{ $type->price . '$' }}
                                            <span class="small">{{ $type->pricePer }}</span>
                                            <span class="ms-3"> <del> {{ $type->delPrice . '$' }} </del></span>
                                        </h6>
                                    @endif
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="fw-semibold btn buy-link px-4 ms-2"> Buy </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="add-cart cursor fs-3 bi bi-cart4">
                                                <span data-name="{{ $type->product }}"
                                                    data-price="{{ $type->price . '$' }}" data-image="{{ $type->image }}"
                                                    data-added="0" data-PN="{{ $type->productNo }}"
                                                    data-quantity="{{ $type->quantity }}">
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
        {{ $found->links('Pages.paginator', ['elements' => $found, 'tot' => $pages]) }}
    </div>
@endsection
