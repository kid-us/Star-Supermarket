@extends('Layout.admin')
@section('title', 'Forms')
@section('content')
    <div class="mt-4">
        <h5 id="form-Page" class="border-start border-danger border-5 mb-4"> &nbsp; &nbsp; Forms</h5>

        {{-- Upload new Products --}}
        <form action="/admin/upload" method="POST" class="rounded shadow p-4 section-two small" enctype="multipart/form-data">
            @csrf

            <div class="row justify-content-center rounded">
                @if (session('success'))
                    <p class="bg-success text-light p-2 text-center fw-semibold">
                        <strong>{{ session('success') }}</strong>
                    </p>
                @endif

                <h5 class="py-2 px-4">Upload New Products</h5>
                <div class="section-two col-xs-12 col-sm-9 col-md-4 col-lg-4 small p-4">

                    <label for="item-name">Product Name *</label>
                    <input type="text" name="item-name" id="product-name"
                        class="form-control mb-3 @error('item-name') border-error
                        @enderror"
                        value="{{ old('item-name') }}">

                    <label for="catagories">Catagories *</label>
                    <select name="catagories" id="category"
                        class="form-control mb-3 @error('catagories') border-error
                        @enderror">
                        <option selected hidden></option>
                        <option value="Foods">Food</option>
                        <option value="Beverage">Beverage</option>
                        <option value="Furnitures">Furnitures</option>
                        <option value="Electronics">Electronics</option>
                        <option value="DairyEgg">Dairy & Egg</option>
                        <option value="FruitsVegetables">Fruits & Vegetables</option>
                        <option value="MeatFish">Meat & Fish</option>
                        <option value="HealthBeauty">Health & Beauty</option>
                        <option value="HouseCleaners">Household & Cleaners</option>
                    </select>
                    <label id="type-label" for="product-type" class="hidden">Product Type *</label>

                    <select name="type" id="vg"
                        class="form-control mb-3 hidden @error('type')
                        border-error @enderror"
                        value="{{ old('type') }}" disabled>
                        <option selected hidden></option>
                        <option value="fruit">Fruit</option>
                        <option value="vegetable">Vegetable</option>
                    </select>

                    <select name="type" id="beverage"
                        class="form-control mb-3 hidden @error('type')
                        border-error @enderror"
                        value="{{ old('type') }}" disabled>
                        <option selected hidden></option>
                        <option value="wine">Wine</option>
                        <option value="vodka">Vodka</option>
                        <option value="beer">Beer</option>
                        <option value="soft">Soft</option>
                        <option value="water">Water</option>
                        <option value="energy">Energy</option>
                        <option value="whiskey">Whiskey</option>
                        <option value="champagne">Champagne</option>
                    </select>

                    <select name="type" id="meat"
                        class="form-control mb-3 hidden @error('type')
                        border-error @enderror"
                        value="{{ old('type') }}" disabled>
                        <option selected hidden></option>
                        <option value="chicken">Chicken</option>
                        <option value="fish">Fish</option>
                    </select>
                    <select name="type" id="electronic"
                        class="form-control mb-3 hidden @error('type')
                        border-error @enderror"
                        value="{{ old('type') }}" disabled>
                        <option selected hidden></option>
                        <option value="camera">Camera</option>
                        <option value="mobile">Mobile</option>
                        <option value="laptop">Laptop</option>
                        <option value="tablet">Tablet</option>
                        <option value="gaming">Gaming</option>
                        <option value="tv">Televison</option>
                        <option value="accessories">Accessories</option>
                    </select>

                    <select name="type" id="food"
                        class="form-control mb-3 hidden @error('type')
                            border-error @enderror"
                        value="{{ old('type') }}" disabled>
                        <option selected hidden></option>
                        <option value="bread">Bread</option>
                        <option value="snack">Snack</option>
                    </select>

                    <label for="price">Price Per</label>
                    <input type="text" name="price-per" id="price-per"
                        class="form-control mb-3 @error('price-per')
                            border-error @enderror"
                        value="{{ old('price-per') }}">

                    <label for="price">Price *</label>
                    <input type="number" name="price" id="price" min="1"
                        class="form-control mb-3 @error('price')
                            border-error
                        @enderror"
                        value="{{ old('price') }}">

                    <label for="deleted-price">Deleted Price</label>
                    <input type="number" name="del-price" id="del-price" min="1"
                        class="form-control mb-3 @error('del-price')
                            border-error
                        @enderror"
                        value="{{ old('del-price') }}">
                    {{-- </form> --}}
                </div>

                <div class="section-two col-xs-12 col-sm-9 col-md-4 col-lg-4 pt-4 small">
                    <label for="quantity">Quantity *</label>
                    <input type="number" name="quantity" min="1" id="quantity"
                        class="form-control mb-3 @error('quantity')
                        border-error
                    @enderror"
                        value="{{ old('quantity') }}">

                    <label for="quantity">Product Description *</label>
                    <textarea name="info" id="info" rows="8"
                        class="form-control  mb-3 small fw-semibold @error('info')
                        border-error
                    @enderror"
                        value="{{ old('info') }}" style="resize: none" maxlength="255"></textarea>
                    @error('info')
                        <p class="text-danger small">{{ $message }}</p>
                    @enderror

                    <label for="image">Product Image *</label>
                    <input type="file" id="product-image" name="image"
                        class="form-control mb-3 @error('img-file') border-error
                    @enderror"
                        value="{{ old('image') }}" onchange="previewFile()">
                    @error('image')
                        <p class="text-danger small">{{ $message }} <a class="small text-primary" target="_blank"
                                href="https://remove.bg">Make your
                                picture PNG
                                here</a> </p>
                    @enderror

                </div>
                <div class="section-two col-xs-12 col-sm-9 col-md-4 col-lg-4 py-4 px-4 rounded ">
                    <h6>Website Looking</h6>
                    <div class="shadow rounded product-container text-center p-1 bg-dark text-light">
                        <p id="view-off" class="small rounded bg-danger w-25 text-light m-1"></p>
                        <img id="view-image" alt="" width="140px">
                        <p id="available" class="text-center my-3 text-secondary small">Available (in stock)</p>
                        <p id="view-name" class="fw-semibold text-center mt-2"></p>
                        <p class="small" id="view-per-price"></p>
                        <h5 class="p-1">
                            <span id="view-price"></span>
                            <span class="ms-3"> <del id="view-del-price"></del></span>
                        </h5>
                    </div>
                    <button class="mt-4 btn btn-success w-50 p-2">Upload</button>

                </div>
            </div>
        </form>

        {{-- Edit Products --}}
        <div class="section-two row justify-content-center mt-5 m-1 shadow rounded px-3 mb-5">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 mt-4 mb-2">
                <h5 class="py-2 px-4">Update Products</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 mt-4 mb-2">
                <input type="search" id="searchInput" class="form-control w-75 d-none d-md-block"
                    placeholder="Enter keywords">
                <input type="search" id="searchSmInput" class="form-control w-75 d-block d-md-none"
                    placeholder="Enter keywords">
            </div>

            {{-- Edit on Large Screens --}}
            <div id="updateContainer" class="d-none d-md-block update-shadow p-2 mb-5">
                @if (session('updated'))
                    <p class="text-center small text-light rounded bg-success p-2"> {{ session('updated') }} </p>
                @endif

                @if (session('error'))
                    <p class="text-center bg-danger p-2"> {{ session('error') }} </p>
                @endif

                @if (session('deleted'))
                    <p class="text-center small text-light rounded bg-success p-2"> {{ session('deleted') }} </p>
                @endif

                @foreach ($store as $update)
                    <form action="/admin/change" method="POST">
                        @csrf
                        <div class="col-12 px-5">
                            <div class="d-flex mb-3 mt-3">
                                <fieldset class="fieldset{{ $update->id }} d-flex" disabled>
                                    <input type="text" name="productNo" value="{{ $update->productNo }}" hidden>

                                    <div class="form-floating">
                                        <input type="text" name="editProduct"
                                            class="form-control ms-2 @error('editProduct')
                                            border-error
                                        @enderror"
                                            id="floatingProduct" value="{{ $update->product }}">
                                        <label for="floatingProduct" class="text-primary">Product</label>
                                        @error('editProduct')
                                            <small class="small text-danger">Already exists</small>
                                        @enderror
                                    </div>
                                    <div class="form-floating w-25">
                                        <input type="number" name="editPrice"
                                            class="form-control ms-2 @error('editPrice')
                                        border-error
                                    @enderror"
                                            id="floatingPrice" value="{{ $update->price }}" min="1">
                                        <label for="floatingPrice" class="text-primary">Price</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="number" name="editDelPrice"
                                            class="form-control ms-2 @error('editDelPrice')
                                            border-error
                                        @enderror"
                                            id="floatingDelPrice" value="{{ $update->delPrice }}" min="1">
                                        <label for="floatingDelPrice" class="text-primary">Deleted Price</label>
                                    </div>

                                    <div class="form-floating">
                                        <input type="text" name="editPricePer"
                                            class="form-control ms-2 @error('editPricePer')
                                            border-error
                                        @enderror"
                                            id="floatingPricePer" value="{{ $update->pricePer }}">
                                        <label for="floatingDelPrice" class="text-primary">Price per</label>
                                    </div>


                                    <div class="form-floating">
                                        <input type="number" name="editQuantity"
                                            class="form-control ms-2 @error('editQuantity')
                                        border-error
                                        @enderror"
                                            id="floatingQuantity" value="{{ $update->quantity }}" min="1">
                                        <label for="floatingQuantity" class="text-primary">Quantity</label>
                                    </div>

                                </fieldset>
                                <a class="edit-btn btn bi bi-pencil bg-warning text-light pt-3"
                                    data-num="{{ $update->id }}"></a>

                                <button name="del"
                                    class="del-product delete-btn{{ $update->id }} btn bi bi-trash bg-danger text-light"
                                    data-num="{{ $update->id }}"></button>

                                <button name="submit"
                                    class="submit-btn{{ $update->id }} btn bi bi-arrow-return-right bg-success text-light hidden"></button>

                                <a class="close-btn clsBtn{{ $update->id }} btn bi bi-x bg-secondary text-light pt-3 hidden"
                                    data-num="{{ $update->id }}"></a>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>

            {{-- Edit on small Devives --}}
            <div id="smUpdateContainer" class="d-block d-md-none">
                @foreach ($store as $update)
                    <form action="/admin/change" method="POST" class="border p-3 mb-3 rounded shadow">
                        @csrf

                        <fieldset class="fieldset{{ $update->id }} d-flex" disabled>
                            <div class="col-6">

                                <input type="text" name="productNo" value="{{ $update->productNo }}" hidden>
                                <div class="form-floating mb-3">
                                    <input type="text" name="editProduct"
                                        class="form-control ms-2 @error('editProduct')
                                                border-error
                                            @enderror"
                                        id="floatingInput" value="{{ $update->product }}">
                                    <label for="floatingInput" class="text-primary">Product</label>
                                    @error('editProduct')
                                        <small class="text-danger">Product name already exists</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" name="editPrice"
                                        class="form-control ms-2 @error('editPrice')
                                            border-error
                                        @enderror"
                                        id="floatingInput" value="{{ $update->price }}" min="1">
                                    <label for="floatingInput" class="text-primary">Price</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="number" name="editDelPrice"
                                        class="form-control ms-2 @error('editDelPrice')
                                                border-error
                                            @enderror"
                                        id="floatingInput" value="{{ $update->delPrice }}" min="1">
                                    <label for="floatingInput" class="text-primary">Deleted Price</label>
                                </div>

                            </div>
                            <div class="col-6">

                                <div class="form-floating mb-3">
                                    <input type="number" name="editQuantity"
                                        class="form-control ms-2 @error('editQuantity')
                                            border-error
                                            @enderror"
                                        id="floatingInput" value="{{ $update->quantity }}" min="1">
                                    <label for="floatingInput" class="text-primary">Quantity</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" name="editPricePer"
                                        class="form-control ms-2 @error('editPricePer')
                                        border-error
                                    @enderror"
                                        id="floatingInput">
                                    <label for="floatingInput" class="text-primary">Price Per</label>
                                </div>
                            </div>
                        </fieldset>
                        <div class="col-12">
                            <a class="edit-btn btn bi bi-pencil bg-warning text-light w-25"
                                data-num="{{ $update->id }}"></a>

                            <button name="delete"
                                class="del-product delete-btn{{ $update->id }} btn bi bi-trash bg-danger text-light w-25"
                                data-num="{{ $update->id }}"></button>
                        </div>
                        <div class="col-12">
                            <button name="submit"
                                class="submit-btn{{ $update->id }} btn bi bi-arrow-return-right bg-success text-light hidden w-25"></button>

                            <a class="close-btn clsBtn{{ $update->id }} btn bi bi-x bg-secondary text-light hidden 25"
                                data-num="{{ $update->id }}"></a>

                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
