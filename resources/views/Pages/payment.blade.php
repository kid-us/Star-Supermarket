<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" id="main" href="{{ asset('Css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    {{-- \/ phone intel css and js --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.min.js"></script>

    {{-- country flag --}}
    <link rel="stylesheet" href=" {{ asset('Css/countrySelect.css') }} ">

    <link rel="website icon" href="{{ asset('Img/shopping-bag.png') }}">

</head>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .multiple-payment {
        height: 380px;
        overflow: scroll;
    }
</style>
<title>Payment - Star</title>
</head>

<body class="section-one">
    <div class="container fw-semibold p-5 mt-2">
        <div class="row justify-content-center py-2">
            @php
                $stat = Session::get('status');
            @endphp
            @if ($stat == 'single')
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 px-3">
                    <h3 class=""><a href="/star" class="bi bi-cart-fill small fw-semibold">&nbsp; Star</a></h3>
                    <p class="mt-4 mb-0 fs-3">{{ Session::get('item')[0]['Item-name'] }}</p>
                    <p class="small">Delivery Charge 10$</p>
                    <h4 class="fs-2"> Total
                        {{ intval(Session::get('item')[0]['Item-price']) * Session::get('item')[0]['quant'] + 10 . " US$" }}
                    </h4>
                    <li class="my-0">Qty <span class="small">{{ Session::get('item')[0]['quant'] }}</span>
                        {{ Session::get('item')[0]['Item-price'] }}.00 US$ each</li>
                    <img src="{{ asset('uploads/' . Session::get('item')[0]['Item-image']) }}" alt=""
                        class="img-fluid pb-5" width="250px" class="section-two rounded">
                    <ul class="small">
                        <li class="pt-3">Powered by <span class="">stripe</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 rounded shadow section-two">
                    @php
                        $tot = intval(Session::get('item')[0]['Item-price']) * intval(Session::get('item')[0]['quant']) + 10;
                    @endphp
                    <form action="/star/pay" method="POST" id="form" class="py-5 px-5 small"
                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <p class="fs-4">Pay with card</p>

                        @if (session('user-name'))
                            <label for="name" class="small">Name on Card</label>
                            <input type="text" name="buyerName"
                                class=" form-control mt-1 mb-3 @error('buyerName')
                                border-error
                                @enderror"
                                value="{{ session('user-name') }}">

                            <label for="email" class="small">Email</label>
                            <input type="email" name="buyerEmail"
                                class="form-control mb-3  @error('buyerEmail')
                                border-error
                                @enderror"
                                value="{{ session('user-email') }}">
                            <label for="email" class="small">Card Information</label>
                            <input type="tel" readonly id="card-number" name="card-number"
                                class=" form-control mt-1  @error('card-number')
                                border-error @enderror"
                                value="4242424242424242">

                            <div class="input-group mb-4">
                                <input type="tel" name="expire-month" id="exp_mon" size="2"
                                    class="form-control mt-0 small @error('expire-month')
                                    border-error @enderror"
                                    value="12" readonly>
                                <input type="tel" name="expire-year" size="4" id="exp_year"
                                    class="form-control mt-0 small @error('expire-year')
                                    border-error @enderror"
                                    value="2028" size="3" readonly>
                                <input type="number" name="card-code" id="cvc"
                                    class="form-control mt-0 small @error('card-code')
                                    border-error @enderror"
                                    value="123" readonly>
                            </div>

                            <label for="phone" class="small me-2 pe-1">Phone</label>
                            <input type="tel" id="phone-flag" name="phone"
                                class="form-control mb-1 @error('phone')
                                border-error @enderror"
                                style="z-index: 0;"><br>

                            <label for="country" class="small mt-4 me-3">Country</label>
                            <input type="text" id="country" name="country"
                                class="small form-control mt-1 mb-2 @error('country')
                                    border-error @enderror"
                                value="{{ session('user-country') }}">

                            <br> <br>

                            <label for="city" class="small mt-2 me-3">City</label>
                            <input type="text" name="city"
                                class="small form-control mt-1 mb-2 @error('city')
                                border-error @enderror"
                                value="{{ session('user-city') }}">

                            <label for="address" class="small mt-2 me-3">Address</label>
                            <input type="text" name="address"
                                class="small form-control mt-1 mb-2 @error('address')
                                border-error @enderror"
                                value="{{ session('user-address') }}">
                        @else
                            <label for="name" class="small">Name on Card</label>
                            <input type="text" name="buyerName"
                                class=" form-control mt-1 mb-3 @error('buyerName')
                                border-error @enderror"
                                value="{{ old('buyerName') }}">

                            <label for="email" class="small">Email</label>
                            <input type="email" name="buyerEmail"
                                class="form-control mb-3  @error('buyerEmail')
                                border-error @enderror"
                                value="{{ old('buyerEmail') }}">
                            <label for="email" class="small">Card Information</label>
                            <input type="tel" readonly id="card-number" name="card-number"
                                class=" form-control mt-1  @error('card-number')
                                border-error @enderror"
                                value="4242424242424242">

                            <div class="input-group mb-4">
                                <input type="tel" name="expire-month" id="exp_mon" size="2"
                                    class="form-control mt-0 small @error('expire-month')
                                    border-error @enderror"
                                    value="12" readonly>
                                <input type="tel" name="expire-year" size="4" id="exp_year"
                                    class="form-control mt-0 small @error('expire-year')
                                    border-error @enderror"
                                    value="2028" size="3" readonly>
                                <input type="number" name="card-code" id="cvc"
                                    class="form-control mt-0 small @error('card-code')
                                    border-error @enderror"
                                    value="123" readonly>
                            </div>

                            <label for="phone" class="small me-2 pe-1">Phone</label>
                            <input type="tel" id="phone-flag" name="phone"
                                class="form-control mb-1 @error('phone')
                                border-error @enderror"
                                style="z-index: 0;"><br>

                            <label for="country" class="small mt-4 me-4">Country</label>
                            <input type="text" id="country" name="country"
                                class="small form-control mt-2 mb-3 @error('country') 
                                 border-error @enderror">

                            <br><br>
                            <label for="country" class="small mt-2 me-3">City</label>
                            <input type="text" name="city"
                                class="small form-control mt-1 mb-2 @error('city')
                                border-error @enderror">

                            <label for="country" class="small me-3 mt-2">Address</label>
                            <input type="text" name="address"
                                class="small form-control mt-2 @error('address')
                                border-error @enderror">
                        @endif

                        <input type="text" name="price"
                            value="{{ intval(Session::get('item')[0]['Item-price']) * Session::get('item')[0]['quant'] + 10 . " $" }}"
                            readonly hidden>
                        <input type="number" name="quantity" value="{{ Session::get('item')[0]['quant'] }}"
                            readonly hidden>
                        <input type="number" name="proNo" value="{{ Session::get('item')[0]['Item-productNo'] }}"
                            readonly hidden>
                        <input type="text" id="stripeToken" name="stripeToken" hidden>

                        <input type="text" name="totalPrice" hidden value="{{ $tot }}">

                        <button class="btn btn-primary w-100 mt-4">Pay</button>
                    </form>
                </div>

                {{-- Multiple payment --}}
            @else
                {{-- Multiple items with single product --}}
                @if (Session::get('multiple_item')[0]['Item-length'] == '1')
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 px-5">
                        <h5 class=""><a href="/star" class="bi bi-cart-fill small fw-semibold">&nbsp;
                                Star</a></h5>
                        <p class="mt-4 mb-0 fs-3">{{ Session::get('multiple_item')[0]['Item-name'][0] }}</p>
                        <p class="small">Delivery Charge 10$</p>
                        <h4 class="fs-2">Total
                            {{ intval(Session::get('multiple_item')[0]['Item-price'][0]) * Session::get('multiple_item')[0]['Item-quant'][0] + 10 . "US$" }}
                        </h4>
                        <li class="my-0">Qty <span>{{ Session::get('multiple_item')[0]['Item-quant'][0] }}</span>
                            US
                            {{ Session::get('multiple_item')[0]['Item-price'][0] }}.00 each
                        </li>
                        <img src="{{ asset('uploads/' . Session::get('multiple_item')[0]['Item-image'][0]) }}"
                            alt="" class="img-fluid pb-5" width="270px" class="section-two">
                        <ul class="mt-5 small">
                            <li class="pt-3">Powered by <span class="">stripe</span></li>
                        </ul>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 rounded section-two shadow">
                        @php
                            $tot = intval(Session::get('multiple_item')[0]['Item-price'][0]) * Session::get('multiple_item')[0]['Item-quant'][0] + 10;
                        @endphp
                        <form action="/star/pay" method="POST" id="form" class="py-4 px-5 small"
                            data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                            @csrf
                            <p class="fs-4">Pay with card</p>

                            @if (session('user-name'))
                                <label for="name" class="small">Name on Card</label>
                                <input type="text" name="buyerName"
                                    class=" form-control mt-1 mb-3 @error('buyerName')
                                    border-error @enderror"
                                    value="{{ session('user-name') }}">

                                <label for="email" class="small">Email</label>
                                <input type="email" name="buyerEmail"
                                    class="form-control mb-3  @error('buyerEmail')
                                    border-error @enderror"
                                    value="{{ session('user-email') }}">

                                <label for="email" class="small">Card Information</label>
                                <input type="tel" readonly id="card-number" name="card-number"
                                    class=" form-control mt-1  @error('card-number')
                                        border-error
                                    @enderror"
                                    value="4242424242424242">

                                <div class="input-group mb-4">
                                    <input type="tel" name="expire-month" id="exp_mon" size="2"
                                        class="form-control mt-0 small @error('expire-month')
                                            border-error
                                        @enderror"
                                        value="12" readonly>
                                    <input type="tel" name="expire-year" size="4" id="exp_year"
                                        class="form-control mt-0 small @error('expire-year')
                                            border-error
                                        @enderror"
                                        value="2028" size="3" readonly>
                                    <input type="number" name="card-code" id="cvc"
                                        class="form-control mt-0 small @error('card-code')
                                            border-error
                                        @enderror"
                                        value="123" readonly>
                                </div>
                                <label for="phone" class="small me-2 pe-1">Phone</label>
                                <input type="tel" id="phone-flag" name="phone"
                                    class="form-control mb-1 @error('phone')
                                        border-error
                                    @enderror"
                                    style="z-index: 0;"><br>

                                <label for="country" class="small mt-4 me-3">Country</label>
                                <input type="text" id="country" name="country"
                                    class="small form-control mt-1 mb-2 @error('country')
                                    border-error @enderror"
                                    value="{{ session('user-country') }}">
                                <br><br>
                                <label for="city" class="small mt-2 me-3">City</label>
                                <input type="text" name="city"
                                    class="small form-control mt-1 mb-2 @error('city')
                                border-error @enderror"
                                    value="{{ session('user-city') }}">

                                <label for="address" class="small mt-2 me-3">Address</label>
                                <input type="text" name="address"
                                    class="small form-control mt-1 mb-2 @error('address')
                                border-error @enderror"
                                    value="{{ session('user-address') }}">
                            @else
                                <label for="name" class="small">Name on Card</label>
                                <input type="text" name="buyerName"
                                    class=" form-control mt-1 mb-3 @error('buyerName')
                                    border-error @enderror"
                                    value="{{ old('buyerName') }}">

                                <label for="email" class="small">Email</label>
                                <input type="email" name="buyerEmail"
                                    class="form-control mb-3  @error('buyerEmail')
                                    border-error @enderror"
                                    value="{{ old('buyerEmail') }}">
                                <label for="email" class="small">Card Information</label>
                                <input type="tel" readonly id="card-number" name="card-number"
                                    class=" form-control mt-1  @error('card-number')
                                        border-error
                                    @enderror"
                                    value="4242424242424242">

                                <div class="input-group mb-4">
                                    <input type="tel" name="expire-month" id="exp_mon" size="2"
                                        class="form-control mt-0 small @error('expire-month')
                                            border-error
                                        @enderror"
                                        value="12" readonly>
                                    <input type="tel" name="expire-year" size="4" id="exp_year"
                                        class="form-control mt-0 small @error('expire-year')
                                            border-error
                                        @enderror"
                                        value="2028" size="3" readonly>
                                    <input type="number" name="card-code" id="cvc"
                                        class="form-control mt-0 small @error('card-code')
                                            border-error
                                        @enderror"
                                        value="123" readonly>
                                </div>
                                <label for="phone" class="small me-2 pe-1">Phone</label>
                                <input type="tel" id="phone-flag" name="phone"
                                    class="form-control mb-1 @error('phone')
                                        border-error
                                    @enderror"
                                    style="z-index: 0;"><br>

                                <label for="country" class="small me-4">Country</label>
                                <input type="text" id="country" name="country"
                                    class="small form-control mt-2 mb-3 @error('country') 
                                         border-error @enderror">

                                <label for="country" class="small mt-2 me-3">City</label>
                                <input type="text" name="city"
                                    class="small form-control mt-1 mb-2 @error('city')
                                        border-error @enderror">

                                <label for="country" class="small me-3 mt-2">Address</label>
                                <input type="text" name="address"
                                    class="small form-control mt-2 @error('address')
                                        border-error @enderror">
                            @endif

                            <input type="text" name="price"
                                value="{{ intval(Session::get('multiple_item')[0]['Item-price'][0]) * Session::get('multiple_item')[0]['Item-quant'][0] + 10 . " $" }}"
                                readonly hidden>
                            <input type="number" name="quantity"
                                value="{{ Session::get('multiple_item')[0]['Item-quant'][0] }}" readonly hidden>
                            <input type="number" name="proNo"
                                value="{{ Session::get('multiple_item')[0]['Item-productNo'][0] }}" readonly hidden>
                            <input type="text" id="stripeToken" name="stripeToken" hidden>

                            <input type="text" name="totalPrice" hidden value="{{ $tot }}">
                            <button class="btn btn-primary w-100 mt-4">Pay</button>
                        </form>
                    </div>
                    {{-- Multiple items with multiple product --}}
                @else
                    <div class="col-12 col-md-12 col-lg-6 py-5 px-5 fw-semibold">
                        <h5 class=""><a href="/star" class="bi bi-cart-fill small fs-5 fw-semibold">&nbsp;
                                Star</a></h5>
                        <p class="mt-4 mb-0">Multiple Items</p>
                        <li class="mb-3">{{ Session::get('multiple_item')[0]['Item-length'] . ' Products' }}</li>
                        <div
                            class="row border justify-content-center rounded multiple-payment payImg-bg text-light px-4">
                            @php
                                $sum = 0;
                            @endphp
                            @for ($i = 0; $i < Session::get('multiple_item')[0]['Item-length']; $i++)
                                @php
                                    $sum = $sum + intval(Session::get('multiple_item')[0]['Item-price'][$i]) * Session::get('multiple_item')[0]['Item-quant'][$i];
                                @endphp
                                </li>
                                <div class="col-6 pt-5">
                                    <img src="{{ asset('uploads/' . Session::get('multiple_item')[0]['Item-image'][$i]) }}"
                                        alt=""class="img-fluid pb-5" width="150px">
                                </div>
                                <div class="col-6 pt-5">
                                    <h5>{{ Session::get('multiple_item')[0]['Item-name'][$i] }}</h5>
                                    <h6>{{ Session::get('multiple_item')[0]['Item-price'][$i] . ' each' }}</h6>
                                    <p>Qty: {{ Session::get('multiple_item')[0]['Item-quant'][$i] }}</p>
                                </div>
                                <hr class="text-light">
                            @endfor
                        </div>
                        <p class="small mt-4">Delivery Charge 10$</p>
                        <h3> Total @php
                            echo $sum + 10;
                        @endphp US$</h3>
                        <ul class="mt-5 small">
                            <li class="pt-3">Powered by <span class="">stripe</span></li>
                        </ul>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 py-4 rounded shadow section-two">
                        <form action="/star/pay" method="POST" id="form" class="py-4 px-5 small"
                            data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                            @csrf

                            <p class="fs-4">Pay with card</p>
                            <input type="text" name="buyingType" value="multiple" hidden> <br>

                            @if (session('user-name'))
                                <label for="name" class="small">Name on Card</label>
                                <input type="text" name="buyerName"
                                    class=" form-control mt-1 mb-3 @error('buyerName')
                                    border-error @enderror"
                                    value="{{ session('user-name') }}">
                                <label for="email" class="small">Email</label>
                                <input type="email" name="buyerEmail"
                                    class="form-control mt-1 mb-3  @error('buyerEmail')
                                    border-error @enderror"
                                    value="{{ session('user-email') }}">
                                <label for="email" class="small">Card Information</label>
                                <input type="tel" readonly id="card-number" name="card-number"
                                    class=" form-control mt-1 bi bi-cart @error('card-number')
                                        border-error @enderror"
                                    value="4242 4242 4242 4242">

                                <div class="input-group mb-4">
                                    <input type="tel" name="expire-month" id="exp_mon" size="2"
                                        class="form-control mt-0 small @error('expire-month')
                                            border-error @enderror"
                                        value="12" readonly>

                                    <input type="tel" name="expire-year" size="4" id="exp_year"
                                        class="form-control mt-0 small @error('expire-year')
                                            border-error @enderror"
                                        value="2028" size="3" readonly>
                                    <input type="number" name="card-code" id="cvc"
                                        class="form-control mt-0 small @error('card-code')
                                            border-error @enderror"
                                        value="123" readonly>
                                </div>

                                <label for="phone" class="small me-2 pe-1">Phone</label>
                                <input type="tel" id="phone-flag" name="phone"
                                    class=" form-control @error('phone')
                                        border-error @enderror"
                                    value="{{ old('phone') }}" style="z-index: 0;"><br>

                                <label for="country" class="small mt-4 me-3">Country</label>
                                <input type="text" id="country" name="country"
                                    class="small form-control mt-1 mb-2 @error('country')
                                    border-error @enderror"
                                    value="{{ session('user-country') }}"> <br> <br>

                                <label for="city" class="small mt-2 me-3">City</label>
                                <input type="text" name="city"
                                    class="small form-control mt-1 mb-2 @error('city')
                                border-error @enderror"
                                    value="{{ session('user-city') }}">

                                <label for="address" class="small mt-2 me-3">Address</label>
                                <input type="text" name="address"
                                    class="small form-control mt-1 mb-2 @error('address')
                                border-error @enderror"
                                    value="{{ session('user-address') }}">
                            @else
                                <label for="name" class="small">Name on Card</label>
                                <input type="text" name="buyerName"
                                    class=" form-control mt-1 mb-3 @error('buyerName')
                                    border-error @enderror"
                                    value="{{ old('buyerName') }}">

                                <label for="email" class="small">Email</label>
                                <input type="email" name="buyerEmail"
                                    class="form-control mt-1 mb-3  @error('buyerEmail')
                                    border-error @enderror"
                                    value="{{ old('buyerEmail') }}">
                                <label for="email" class="small">Card Information</label>
                                <input type="tel" readonly id="card-number" name="card-number"
                                    class=" form-control mt-1 bi bi-cart @error('card-number')
                                border-error @enderror"
                                    value="4242 4242 4242 4242">

                                <div class="input-group mb-4">
                                    <input type="tel" name="expire-month" id="exp_mon" size="2"
                                        class="form-control mt-0 small @error('expire-month')
                                    border-error @enderror"
                                        value="12" readonly>

                                    <input type="tel" name="expire-year" size="4" id="exp_year"
                                        class="form-control mt-0 small @error('expire-year')
                                    border-error @enderror"
                                        value="2028" size="3" readonly>
                                    <input type="number" name="card-code" id="cvc"
                                        class="form-control mt-0 small @error('card-code')
                                    border-error @enderror"
                                        value="123" readonly>
                                </div>

                                <label for="phone" class="small me-2 pe-1">Phone</label>
                                <input type="tel" id="phone-flag" name="phone"
                                    class=" form-control @error('phone')
                                border-error @enderror"
                                    value="{{ old('phone') }}" style="z-index: 0;"><br>

                                <label for="country" class="small me-4 mt-4">Country</label>
                                <input type="text" id="country" name="country"
                                    class="small form-control mt-2 mb-3 @error('country') 
                                         border-error @enderror">
                                <br> <br>
                                <label for="country" class="small mt-2 me-3">City</label>
                                <input type="text" name="city"
                                    class="small form-control mt-1 mb-2 @error('city')
                                        border-error @enderror">

                                <label for="country" class="small me-3 mt-2">Address</label>
                                <input type="text" name="address"
                                    class="small form-control mt-2 @error('address')
                                        border-error @enderror">
                            @endif

                            @for ($i = 0; $i < Session::get('multiple_item')[0]['Item-length']; $i++)
                                <input type="text" name="proNo[]"
                                    value="{{ Session::get('multiple_item')[0]['Item-productNo'][$i] }}" hidden>
                                <input type="text" name="quantity[]" hidden
                                    value="{{ Session::get('multiple_item')[0]['Item-quant'][$i] }}">
                                {{-- <input type="text" name="price[]" hidden
                                value="{{ Session::get('multiple_item')[0]['Item-price'][$i] }}"> --}}
                            @endfor
                            <input type="text" id="stripeToken" name="stripeToken" id="stripe-token-id" hidden>
                            <input type="text" name="totalPrice" hidden readonly readonly
                                value="
                            @php echo $sum + 10; @endphp ">
                            <button type="submit" id="pay-btn" class="btn btn-primary w-100 mt-5"> Pay </button>
                        </form>
                    </div>
                @endif
            @endif
        </div>
    </div>

</body>
<script src=" {{ asset('JS/theme.js') }}"></script>
<script src=" {{ asset('JS/countrySelect.min.js') }}"></script>
<script>
    $("#country").countrySelect({
        defaultCountry: "et",
        preferredCountries: ['et', 'er', 'us'],
        responsiveDropdown: true
    });
</script>
<script src="{{ asset('JS/payment.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    $('#form').on('submit', (e) => {
        const form = $('#form');
        e.preventDefault();

        const cardNumber = $('#card-number').val();
        const cvc = $('#cvc').val();
        const expiryMonth = $('#exp_mon').val();
        const expiryYear = $('#exp_year').val();

        if (!form.data('cc-on-file')) {
            Stripe.setPublishableKey(form.data('stripe-publishable-key'));

            Stripe.createToken({
                number: cardNumber,
                cvc: cvc,
                exp_month: expiryMonth,
                exp_year: expiryYear
            }, (status, response) => {

                if (response.error) return alert('Error');

                let token = response['id'];

                $('#stripeToken').attr('value', token);

                document.getElementById('form').submit();
            });
        }
    });
</script>

</html>
