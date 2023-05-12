@extends('Layout.admin')
@section('title', 'Dashboard')
@section('content')
    <div class="mt-5 rounded">
        {{-- Dashboard --}}
        <div class="row justify-content-center p-3">
            <h5 class="mb-4 border-start border-5 border-danger"> &nbsp; Dashboard </h5>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                <div class="row shadow rounded px-2 py-2 section-two">
                    <div class="col-6 bg-info rounded pt-2">
                        <h1><span class="bi bi-envelope-check-fill"></span></h1>
                    </div>
                    <div class="col-6">
                        <li>Suscription</li>
                        <li>4%</li>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                <div class="row shadow rounded px-2 py-2 section-two">
                    <div class="col-6 bg-info rounded pt-2">
                        <h1><span class="bi bi-hand-thumbs-up-fill"></span></h1>
                    </div>
                    <div class="col-6">
                        <li>Likes</li>
                        <li class="small">4%</li>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mb-2">
                <div class="row shadow rounded px-2 py-2 section-two">
                    <div class="col-6 bg-info rounded pt-2">
                        <h1><span class="bi bi-cart-fill"></span></h1>
                    </div>
                    <div class="col-6">
                        <li>Sales</li>
                        <li class="small">4%</li>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3">
                <div class="row shadow rounded px-2 py-2 section-two">
                    <div class="col-6 bg-info rounded pt-2">
                        <h1><span class="bi bi-people-fill"></span></h1>
                    </div>
                    <div class="col-6">
                        <li>Customers</li>
                        <li class="small">{{ $customerNum }}</li>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Online Store Overview --}}
    <div class="row justify-content-center mt-5">
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
            <div class="shadow rounded p-4 section-two">
                <h6 class="mb-4 border-start border-5 border-danger"> &nbsp; Online Store Overview </h6>

                <div class="row justify-content-center">
                    <div class="col-6 my-3 bg-danger rounded p-3 text-light">
                        <h3>Total Products</h3>
                    </div>
                    <div class="col-6 my-3 bg-info rounded px-3 py-5">
                        <h4>{{ $all }} Products</h4>
                    </div>
                    <div class="col-6 my-3 bg-danger rounded p-3 text-light">
                        <h3>Toatal Sales</h3>
                    </div>
                    <div class="col-6 my-3 bg-info rounded px-3 py-5">
                        <h4> {{ $sales }}$ </h4>
                    </div>
                    <div class="col-6 my-3 bg-danger rounded p-3 text-light">
                        <h3>Out of Stock Produts</h3>
                    </div>
                    <div class="col-6 my-3 bg-info rounded px-3 py-5">
                        <h4>{{ $outof }} Products</h4>
                    </div>
                </div>
            </div>
        </div>
        {{-- top Product --}}
        <div class="col-sm-12 col-md-6 col-lg-8">
            <div class="shadow rounded pt-4 px-5 bg-dark">
                <table class="table table-borderless table-responsive table table-dark table-striped table-hover">
                    <h6 class="mb-4 border-start border-5 border-danger text-light"> &nbsp; Top Prodcuts</h6>
                    <thead class="border-bottom text-danger">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Sales</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($sold as $items)
                            <tr class="m-3">
                                <td><img src="{{ asset("uploads/$items->image") }}" alt="" width="70px"
                                        alt=""></td>
                                <td>{{ $items->product }}</td>
                                <td>{{ $items->price }}$</td>
                                <td>{{ $items->sold }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/admin/table" class="small text-end text-primary">See all</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        {{-- Members --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mt-2">
            <div class="shadow rounded bg-dark text-light">
                <h6 class="ps-2 py-3">Members</h6>
                <div class="row justify-content-center px-5 text-center">
                    @foreach ($users as $our)
                        <div class="col-4 fs-5">
                            <p class="bi bi-person-check-fill"></p>
                            <p class="member">{{ $our->username }}</p>
                        </div>
                    @endforeach
                    <a href="/admin/table" class="small text-end text-primary">See all</a>

                </div>

            </div>
        </div>
        {{-- Ending Product --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mt-2 ">
            <div class="shadow rounded section-two px-3 py-1">
                <h6 class="ps-2 pt-3">On Ending Products</h6>
                <table class="table table-borderless table-responsive table-striped table-hover">
                    <thead class="border-bottom text-danger">
                        <tr class="small">
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Remaing</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($end as $out)
                            @if ($out->quantity > 0)
                                <tr>
                                    <td><img src="{{ asset("uploads/$out->image") }}" alt="" width="60px"></td>
                                    <td>{{ $out->product }}</td>
                                    <td>{{ $out->quantity }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <a href="/admin/table" class="small text-end text-primary">See all</a>

            </div>
        </div>
        {{-- Out of stuck Products --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mt-2 ">
            <div class="shadow rounded section-two px-3 py-1">
                <h6 class="ps-2 pt-3">Out of Stock Product</h6>
                <table class="table table-borderless table-responsive table-striped table-hover">
                    <thead class="border-bottom text-danger">
                        <tr class="small">
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Remaing</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($end as $out)
                            @if ($out->quantity == 0)
                                <tr>
                                    <td><img src="{{ asset("uploads/$out->image") }}" alt="" width="60px"></td>
                                    <td>{{ $out->product }}</td>
                                    <td>{{ $out->quantity }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <a href="/admin/table" class="small text-end text-primary">See all</a>

            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        {{-- Latest Orders --}}
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-8">
            <div class="shadow rounded mb-4 p-5 bg-dark">
                <h6 class="mb-4 border-start border-5 border-danger text-light"> &nbsp; Latest Orders</h6>
                <table class="table table-borderless table-responsive table table-dark table-striped rounded py-2">
                    <thead class="border-bottom text-danger">
                        <tr>
                            <th scope="col">Username</th>
                            <th scope="col">Product No</th>
                            {{-- <th scope="col">Email</th> --}}
                            <th scope="col">Quantity</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customer as $our)
                            {{-- @php
                                $fdate = date('Y-m-d H:i:s');
                                $tdate = $our->created_at;
                                $datetime1 = new DateTime($fdate);
                                $datetime2 = new DateTime($tdate);
                                $interval = $datetime1->diff($datetime2);
                                $days = $interval->format('%a');
                            @endphp
                            @if ($days <= 30) --}}
                            <tr>
                                <td>{{ $our->customerName }}</td>
                                <td>{{ $our->productNo }}</td>
                                {{-- <td>{{ $our->customerEmail }}</td> --}}
                                <td>{{ $our->quant }}</td>
                                <td>
                                    @if ($our->status === 0)
                                        Pending <i class="bi bi-hourglass text-danger"></i>
                                    @elseif ($our->status === 1)
                                        On the Way <i class="bi bi-bicycle text-warning"></i>
                                    @else
                                        Delivered <i class="bi bi-check2-all text-success"></i>
                                    @endif
                                </td>
                            </tr>
                            {{-- @endif --}}
                        @endforeach
                    </tbody>
                </table>
                <a href="/admin/table" class="small text-end text-primary">See all</a>
            </div>
        </div>
        {{-- Added Product --}}
        <div class="col-sm-12 col-md-6 col-lg-4 ">
            <div class="shadow rounded p-4 bg-dark">
                <h6 class="mb-4 border-start border-5 border-danger text-light"> &nbsp; Recently Added Products </h6>
                @foreach ($dash as $latest)
                    @php
                        $fdate = date('Y-m-d H:i:s');
                        $tdate = $latest->created_at;
                        $datetime1 = new DateTime($fdate);
                        $datetime2 = new DateTime($tdate);
                        $interval = $datetime1->diff($datetime2);
                        $days = $interval->format('%a');
                    @endphp
                    @if ($days <= 7)
                        <div class="row justify-content-center">
                            <hr>
                            <div class="col-4">
                                <img src="{{ asset("uploads/$latest->image") }}" alt="" width="70px">
                            </div>
                            <div class="col-8">
                                <h6> {{ $latest->product }} </h6>
                                <p> Price: {{ $latest->price }}</p>
                            </div>
                        </div>
                    @else
                        @once
                            <h3 class="text-danger">No products upload in this Week</h3>
                        @endonce
                    @endif
                @endforeach
                <a href="/admin/table" class="small text-end text-primary">See all</a>
            </div>
        </div>
    </div>
@endsection
