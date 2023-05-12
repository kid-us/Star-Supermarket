@extends('Layout.admin')
@section('title', 'Table')
@section('content')
    <div class="mt-5">
        <h5 class="border-start border-danger border-5 mb-4"> &nbsp; &nbsp; Tables</h5>
        <div class="row justify-content-center mt-5">

            {{-- Top Prodcuts --}}

            <div class="col-sm-12 col-md-6 col-lg-8">
                <div class="shadow rounded pt-4 px-5 bg-dark">
                    <h6 class="mb-4 text-light"> &nbsp; Top Prodcuts</h6>
                    <div class="table-height">
                        <table class="table table-borderless table-responsive table table-dark table-striped table-hover">
                            <thead class="border-bottom text-danger">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Product No</th>
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
                                        <td>{{ $items->productNo }}</td>
                                        <td>{{ $items->price }}$</td>
                                        <td>{{ $items->sold }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Recently Added Products --}}

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="shadow rounded p-4 bg-dark text-light">
                    <h6 class="mb-4"> &nbsp; Recently Added Products </h6>
                    <div class="table-height">
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
                                    <h3 class="text-danger">No products uploaded in this Week</h3>
                                @endonce
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            {{-- Memebers --}}
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mt-2">
                <div class="shadow rounded bg-dark text-light">
                    <h6 class="ps-2 py-3">Members</h6>

                    <div class="row justify-content-center px-5 text-center table-height2">
                        @foreach ($users as $our)
                            <div class="col-4 fs-5">
                                <p class="bi bi-person-check-fill"></p>
                                <p class="member">{{ $our->username }}</p>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            {{-- On Ending Products --}}
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mt-2">
                <div class="shadow rounded bg-dark px-3 py-1">
                    <h6 class="ps-2 pt-3 text-light">On Ending Products</h6>
                    <div class="table-height2">
                        <table class="table table-borderless table-responsive table table-dark table-striped table-hover">
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
                                            <td><img src="{{ asset("uploads/$out->image") }}" alt="" width="60px">
                                            </td>
                                            <td>{{ $out->product }}</td>
                                            <td>{{ $out->quantity }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Out of Stock Product --}}
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 mt-2 ">
                <div class="shadow rounded bg-dark px-3 py-1">
                    <h6 class="ps-2 pt-3 text-light">Out of Stock Product</h6>
                    <div class="table-height2">
                        <table class="table table-borderless table-responsive table table-dark table-striped table-hover">
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
                                            <td><img src="{{ asset("uploads/$out->image") }}" alt=""
                                                    width="60px">
                                            </td>
                                            <td>{{ $out->product }}</td>
                                            <td>{{ $out->quantity }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- Lateset Orders --}}
        <div class="row justify-content-center mt-5">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="shadow rounded mb-4 p-5 bg-dark">
                    <h6 class="mb-4 text-light"> &nbsp; Latest Orders</h6>
                    <div class="table-height">
                        <table class="table table-borderless table-responsive table table-dark table-striped">
                            <thead class="border-bottom text-danger">
                                <tr>
                                    <th scope="col">Username</th>
                                    <th scope="col">Product No</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customer as $our)
                                    @php
                                        $fdate = date('Y-m-d H:i:s');
                                        $tdate = $our->created_at;
                                        $datetime1 = new DateTime($fdate);
                                        $datetime2 = new DateTime($tdate);
                                        $interval = $datetime1->diff($datetime2);
                                        $days = $interval->format('%a');
                                    @endphp
                                    @if ($days <= 30)
                                        <tr>
                                            <td>{{ $our->customerName }}</td>
                                            <td>{{ $our->productNo }}</td>
                                            <td>{{ $our->customerEmail }}</td>
                                            <td>{{ $our->quant }}</td>
                                            @if ($our->status === 0)
                                                <td>Pending</td>
                                            @elseif ($our->status === 1)
                                                <td>On the Way</td>
                                            @else
                                                <td>Delivered</td>
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--  All Product --}}
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="shadow rounded mb-4 p-5 bg-dark">
                <h6 class="mb-4 text-light"> &nbsp; All Product</h6>
                <div class="table-height">
                    <table class="table table-borderless table-responsive table-dark table-striped rounded py-2">
                        <thead class="border-bottom text-danger">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Type</th>
                                <th scope="col">Product No</th>
                                <th scope="col">Sold</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dash as $latest)
                                <tr>
                                    <td> <img src="{{ asset("uploads/$latest->image") }}" alt="" width="70px"
                                            alt="">
                                    </td>
                                    <td>{{ $latest->product }}</td>
                                    <td>{{ $latest->price }}</td>
                                    <td>{{ $latest->category }}</td>
                                    <td>{{ $latest->type }}</td>
                                    <td>{{ $latest->productNo }}</td>
                                    <td>{{ $latest->sold }}</td>
                                    <td>{{ $latest->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
