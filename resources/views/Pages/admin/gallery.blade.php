@extends('Layout.admin')
@section('title', 'Gallery')
@section('content')
    <div class="mt-5">
        <h5 class="border-start border-danger border-5 mb-4"> &nbsp; &nbsp; Gallery</h5>
        <div class="row justify-content-center p-3">
            @for ($i = 1; $i < 16; $i++)
                <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12 mb-5">
                    <img src="{{ asset("Img/gallery/$i.jpg") }}" alt="" class="gallery rounded shadow">
                </div>
            @endfor
        </div>
    </div>
@endsection
