@extends('Layout.pages')
@section('mytitle', $product)
@section('content')
    <div id="carousel" class="container fw-semibold carousel-m">
        <div class="row justify-content-center shadow rounded p-5 mt-5 section-two">
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-5 product-container px-5">
                <h3 class="mb-5">{{ $product }}</h3>
                <p class="hidden"></p>
                <img src="{{ asset('uploads/' . $img) }}" class="img-fluid" alt="">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7 small">
                <p class="my-3">
                    <span class="text-secondary">Product No: {{ $productNo }}</span>
                    <span class="ms-5 text-secondary small">Available (Instock)</span>
                </p>
                <p class="fs-6">{{ $description }}</p>

                <p class="mt-4 fs-6">
                    <span>Discount Price: {{ $price }}</span>
                    <span class="ms-5"> <del>MRP Price: {{ $del }}<del></span>
                </p>

                <form action="/star/payment" method="POST" class="mt-4">
                    @csrf
                    <input type="text" name="Item-name" hidden value="{{ $product }}">
                    <input type="text" name="Item-price" hidden value="{{ intval($price) }}">
                    <input type="text" name="Item-productNo" hidden value="{{ $productNo }}">
                    <input type="text" name="Item-image" hidden value="{{ $img }}">
                    <input type="text" name="buying" hidden value="single">
                    {{-- <div class="input-group"> --}}
                    <label for="quantity" class="me-3">Qty </label>
                    <input type="number" name="quant" class="quant form-control me-3 w-25 mb-4" name="quantity"
                        max="{{ $quantity }}" min="1" value="1">
                    <div class="row">
                        <div class="col-6">
                            <button class="fw-semibold btn btn-warning px-5 buy-link"> Order Now </button>
                        </div>
                        <div class="col-lg-3 col-md-4 d-none d-md-block">
                            <a class="add-cart cursor fs-4 bi bi-cart4">
                                <span data-name="{{ $product }}" data-price="{{ $price }}"
                                    data-image="{{ $img }}" data-added="0" data-PN="{{ $productNo }}"></span>
                            </a>
                        </div>
                        <div class="col-3 offset-3 d-block d-md-none">
                            <a class="add-cart cursor fs-4 bi bi-cart4">
                                <span data-name="{{ $product }}" data-price="{{ $price }}"
                                    data-image="{{ $img }}" data-added="0" data-PN="{{ $productNo }}"></span>
                            </a>
                        </div>
                    </div>
                    {{-- <span>


                    </span> --}}
                    {{-- </div> --}}
                </form>
            </div>
        </div>

        {{-- Related items --}}
        <div class="row justify-content-center mt-5 p-4">
            <h4>Similar Products</h4>
            @foreach ($related as $items)
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 mb-4 mt-5 shadow py-5 px-3 text-center section-two">
                    <form action="/star/purchase" method="POST">
                        @csrf
                        <input type="text" name="product" value="{{ $items->product }}" readonly hidden>
                        <input type="text" name="price" value="{{ $items->price . "$" }}" readonly hidden>
                        <input type="text" name="delPrice" value="{{ $items->delPrice . "$" }}" readonly hidden>
                        <input type="text" name="product-no" value="{{ $items->productNo }}" readonly hidden>
                        <input type="text" name="category" value="{{ $items->category }}" readonly hidden>
                        <input type="text" name="quantity" value="{{ $items->quantity }}" readonly hidden>
                        <input type="text" name="info" value="{{ $items->description }}" readonly hidden>
                        <input type="text" name="type" value="{{ $items->type }}" readonly hidden>
                        <input type="text" name="image" value="{{ $items->image }}" readonly hidden>

                        <img src="{{ asset("uploads/$items->image") }}" alt="Similar product image" class="product-img">
                        <p class="text-center my-2 text-secondary small">Available (in stock)</p>
                        <p class="fw-semibold text-center my-2">{{ $items->product }}</p>
                        <h6 class="py-3"> {{ $items->price . '$' }}
                            <span class="ms-3"> <del> {{ $items->delPrice . '$' }} </del></span>
                        </h6>
                        <div class="mb-2">
                            <span>
                                <button class="fw-semibold me-5 btn btn-warning buy-link px-3 w-25"> Buy </button>
                                @if ($items->delPrice == '' || $items->delPrice < $items->price)
                                    <span lass="p-1 smalrounded bg-danger w-25 text-light rounded m-2"></span>
                                @else
                                    <span class="p-1 smalrounded bg-danger w-25 text-light rounded m-2">
                                        {{ intval((($items->delPrice - $items->price) * 100) / $items->delPrice) . ' % off' }}
                                    </span>
                                @endif
                            </span>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
@endsection
