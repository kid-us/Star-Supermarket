<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;


class SearchController extends Controller
{
    public function search($id){
    
        $products = Store::where('product', 'like', '%'.$id.'%')->get();

        if (count($products) > 0){
            foreach ($products as $pro){
                if ($pro->quantity == '0'){
                    echo "
                        <!-- On small Screens-->
                        <div class='d-block d-md-none'>
                            <div class='d-flex justify-content-center mb-4'>
                                <div class='shadow-lg rounded product-container text-center p-1'>
                                    <p class='rounded bg-danger w-25 text-light m-1'>" . intval((($pro->delPrice - $pro->price) * 100) / $pro->delPrice). " % off
                                    </p>
                                    <img src='http://127.0.0.1:8000/uploads/$pro->image' class='product-img'>
                                    <p class='text-center my-2 bg-danger p-2'>Out of stock</p>
                                    <p class='fw-semibold text-center my-1'>$pro->product</p>
                                    <h6 class='py-2'>$pro->price$
                                        <span class='ms-2'> <del>$pro->delPrice$</del></span>
                                    </h6>

                                    <div class='mb-1'>
                                        <span>
                                            <button class='fw-semibold me-4 btn btn-warning buy-link px-3 disabled'> Buy
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>    
                        </div>

                            <!-- On Large Screens-->

                        <div class= 'd-none d-md-block'>
                            <div class='d-flex justify-content-center mb-4'>
                                <div class='shadow-lg w-50 rounded product-container text-center p-1 bg-ooo'>
                                    <p class='rounded bg-danger w-25 text-light m-1'>" . intval((($pro->delPrice - $pro->price) * 100) / $pro->delPrice). " % off
                                    </p>
                                    <img src='http://127.0.0.1:8000/uploads/$pro->image' width='170px'>
                                    <p class='text-center my-2 bg-danger p-2'>Out of stock</p>
                                    <p class='fw-semibold text-center my-1'>$pro->product</p>
                                    <h6 class='py-2'>$pro->price$
                                        <span class='ms-2'> <del>$pro->delPrice$</del></span>
                                    </h6>

                                    <div class='mb-1'>
                                        <span>
                                            <button class='fw-semibold me-4 btn btn-warning buy-link px-3 disabled'> Buy
                                            </button>
                                        </span>

                                        <span>
                                            <a class='add-cart cursor fs-5 bi bi-cart4 ms-4 disabled'>
                                                <span data-name='$pro->product' data-price='$pro->price$'
                                                    data-image='$pro->image' data-added='0'
                                                    data-PN='$pro->productNo'>
                                                </span>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
                }else
                    echo "
                        <!-- On small Screens-->
                        <div class='d-block d-md-none'>
                            <div class='d-flex justify-content-center mb-4'>
                                <div class='shadow-lg rounded product-container text-center p-1'>
                                    <p class='rounded bg-danger w-25 text-light m-1'>" . intval((($pro->delPrice - $pro->price) * 100) / $pro->delPrice). " % off
                                    </p>
                                    <img src='http://127.0.0.1:8000/uploads/$pro->image' class='product-img'>
                                    <form action='/star/purchase' method='POST'>
                                        ".csrf_field()."
                                        <input type='text' name='product' value='$pro->product' readonly hidden>
                                        <input type='text' name='price' value='$pro->price$ readonly hidden>
                                        <input type='text' name='delPrice' value='$pro->delPrice$' readonly hidden>
                                        <input type='text' name='product-no' value='$pro->productNo' readonly hidden>
                                        <input type='text' name='category' value='$pro->category' readonly hidden>
                                        <!-- <input type='text' name='info' value='$pro->info' readonly hidden>  -->
                                        <input type='text' name='image' value='$pro->image'readonly hidden>
                                        <p class='text-center my-1 text-secondary small'>Available (in stock)</p>
                                        <p class='fw-semibold text-center my-1'>$pro->product</p>
                                        <h6 class='py-2'>$pro->price$
                                            <span class='ms-2'> <del>$pro->delPrice$</del></span>
                                        </h6>
                                        <div class='mb-1'>
                                            <span>
                                                <button class='fw-semibold btn btn-warning buy-link px-4'> Buy </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- On Large Screens-->

                        <div class= 'd-none d-md-block'>
                            <div class='d-flex justify-content-center mb-4'>
                                <div class='shadow-lg w-50 rounded product-container text-center p-1'>
                                    <p class='rounded bg-danger w-25 text-light m-1'>" . intval((($pro->delPrice - $pro->price) * 100) / $pro->delPrice). " % off
                                    </p>
                                    <img src='http://127.0.0.1:8000/uploads/$pro->image' class='product-img'>
                                    <form action='/star/purchase' method='POST'>
                                        ".csrf_field()."
                                        <input type='text' name='product' value='$pro->product' readonly hidden>
                                        <input type='text' name='price' value='$pro->price$ readonly hidden>
                                        <input type='text' name='delPrice' value='$pro->delPrice$' readonly hidden>
                                        <input type='text' name='product-no' value='$pro->productNo' readonly hidden>
                                        <input type='text' name='category' value='$pro->category' readonly hidden>
                                        <!-- <input type='text' name='info' value='$pro->info' readonly hidden>  -->
                                        <input type='text' name='image' value='$pro->image'readonly hidden>
                                        <p class='text-center my-1 text-secondary small'>Available (in stock)</p>
                                        <p class='fw-semibold text-center my-1'>$pro->product</p>
                                        <h6 class='py-2'>$pro->price$
                                            <span class='ms-2'> <del>$pro->delPrice$</del></span>
                                        </h6>
                                        <div class='mb-1'>
                                            <span>
                                                <button class='fw-semibold btn btn-warning buy-link px-4'> Buy </button>
                                            </span>
                
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ";
            }              
        }else{
            echo " <h6> We didn't find any result for <span class='text-danger fw-semibold text-center'>'"."$id"."'</span>. Sorry! </h6>";
        }
    }
}
