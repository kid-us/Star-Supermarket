<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\User;
use Hash;
use Stripe;
use Vonage;
use Date;


class UserController extends Controller
{

    public function home(){
        $home = DB::table('stores')->where('sold', '>=', 50)->get()->take(8);
        $all = DB::table('stores')->get()->shuffle()->take(8);
        $site = DB::table('sites')->get();

        return view('Pages.index', [
            'product' => $home,
            'all' => $all,
            'site' => $site
        ]);
    }
    public function fv(){
        $count =  count(DB::select('select * from stores where category = "FruitsVegetables"'));
        $pageItem = ceil($count/2);
        $fv = DB::table('stores')->where('category', '=', 'FruitsVegetables')->paginate(12);
        $site = DB::table('sites')->get();

        return view('Pages.fv', [
            'fv' => $fv, 
            'pages'=> $pageItem,
            'site' => $site
        ]);
    }
    public function beverage(){
        $count =  count(DB::select('select * from stores where category = "Beverage"'));
        $pageItem = ceil($count/2);
        $beverage =  DB::table('stores')->where('category', '=', 'Beverage')->paginate(12);
        $site = DB::table('sites')->get();

        return view('Pages.beverage',[
            'beverage' => $beverage, 
            'pages' => $pageItem,
            'site' => $site
        ]);   
    }
    public function dairy(){
        $count =  count(DB::select('select * from stores where category = "DairyEgg"'));
        $pageItem = ceil($count/2);
        $dairy = DB::table('stores')->where('category', '=', 'DairyEgg')->paginate(12);
        $site = DB::table('sites')->get();

        return view('Pages.dairy',[
            'dairy' => $dairy, 
            'pages' => $dairy,
            'site' => $site
        ]);
    }
    public function electronics(){
        $count =  count(DB::select('select * from stores where category = "Electronics"'));
        $pageItem = ceil($count/2);
        $electronics =  DB::table('stores')->where('category', '=', 'Electronics')->paginate(12);
        $site = DB::table('sites')->get();

        return view('Pages.electronics', [
            'electronics' => $electronics, 
            'pages'=> $pageItem,
            'site' => $site
        ]);
    }
    public function furniture(){
        $count =  count(DB::select('select * from stores where category = "Furnitures"'));
        $pageItem = ceil($count/2);
        $furniture =  DB::table('stores')->where('category', '=', 'Furnitures')->paginate(12);
        $site = DB::table('sites')->get();

        return view('Pages.furniture',[
            'furniture' => $furniture, 
            'pages'=> $pageItem,
            'site' => $site
        ]);
    }
    public function foods(){
        $count =  count(DB::select('select * from stores where category = "Foods"'));
        $pageItem = ceil($count/2);
        $food =  DB::table('stores')->where('category', '=', 'Foods')->paginate(12);
        $site = DB::table('sites')->get();

        return view('Pages.foods',[
            'food' => $food, 
            'pages'=> $pageItem,
            'site' => $site
        ]);
    }
    public function mf(){
        $count =  count(DB::select('select * from stores where category = "MeatFish"'));
        $pageItem = ceil($count/2);
        $meat =  DB::table('stores')->where('category', '=', 'MeatFish')->paginate(12);
        $site = DB::table('sites')->get();

        return view('Pages.mf',[
            'mf' => $meat, 
            'pages'=> $pageItem,
            'site' => $site
        ]);
    }
    public function house(){
        $count =  count(DB::select('select * from stores where category = "HouseCleaners"'));
        $pageItem = ceil($count/2);
        $house =  DB::table('stores')->where('category', '=', 'HouseCleaners')->paginate(12);
        $site = DB::table('sites')->get();

        return view('Pages.house',[
            'hc' => $house, 
            'pages'=> $pageItem,
            'site' => $site
        ]);
    }
    public function health(){
        $count =  count(DB::select('select * from stores where category = "HealthBeauty"'));
        $pageItem = ceil($count/2);
        $health =  DB::table('stores')->where('category', '=', 'HealthBeauty')->paginate(12);
        $site = DB::table('sites')->get();

        return view('Pages.health',[
            'bh' => $health,
            'pages'=> $pageItem,
            'site' => $site
        ]);
    }

    // Purchase and Payment Controller
    public function purchase(Request $request){
        if($request['type'] == ''){
            $product = $request['product'];
            $price = $request['price'];
            $delPrice = $request['delPrice'];
            $description = $request['info'];
            $productNo = $request['product-no'];
            $image = $request['image'];
            $category = $request['category'];
            $quantity = $request['quantity'];

            $related = DB::table('stores')->where('category', '=', "$category")
                                            ->where('product', '!=', "$product")
                                            ->get()->take(4);  
    
            return view("Pages.purchase", [
                'product' => $product, 
                'price'=>$price, 
                'del'=>$delPrice, 
                'productNo'=>$productNo, 
                'img'=>$image, 
                'related'=>$related, 
                'quantity'=>$quantity, 
                'description'=>$description
            ]);

        }else{
            $product = $request['product'];
            $price = $request['price'];
            $delPrice = $request['delPrice'];
            $description = $request['info'];
            $productNo = $request['product-no'];
            $image = $request['image'];
            $type = $request['type'];
            $category = $request['category'];
            $quantity = $request['quantity'];

            $related = DB::table('stores')->where('category', '=', "$category")
                                            ->where('type', '=', "$type")
                                            ->where('product', '!=', "$product")
                                            ->get()->take(4);  
    
            return view("Pages.purchase", [
                'product' => $product, 
                'price'=>$price, 
                'del'=>$delPrice, 
                'productNo'=>$productNo, 
                'img'=>$image, 
                'related'=>$related, 
                'quantity'=>$quantity, 
                'description'=>$description
                ]);
        }
    }
    public function payment(Request $request){

        $stat = $request['buying'];
        $request->session()->put('status', $request['buying']);

        if($stat == 'single'){
            Session::pull("item");
            $all = $request->all();
            $request->session()->push('item', $all);
            return view("Pages.payment");

        }else if ($stat == "multiple"){
            Session::pull("multiple_item");
            $all = $request->all();
            $request->session()->push('multiple_item', $all);
            return view("Pages.payment");
        }
    }
    public function pay(Request $request){

        $this->validate($request, [
            'buyerName' => 'required|min:3',
            'buyerEmail' => 'required|min:14',
            'phone' => 'required',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required'
        ]);

        $invoice = strtoupper (Str::random(1).rand(1,50000));
        
        // Multiple Product Buying
        if ($request->buyingType == "multiple")
        {
            $row = count($request->proNo);  
            $store =  DB::table('stores')->get();
            $size = count($store);
           
            $total = intval(100 * $request->totalPrice);
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $multipleStripe = Stripe\Charge::create([
                "amount" => $total,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Multiple Item Paying" ,
                "metadata" => array("customer"=>$request->buyerEmail, "name"=>$request->buyerName, "country" => $request->country)
            ]);
    
            if($multipleStripe){
                // $basic  = new \Vonage\Client\Credentials\Basic("9ca7210f", "Dl9eqgOqBj4Ix7GR");
                // $client = new \Vonage\Client($basic);
                
                // $from = "Vonage APIs";
                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS("251936231225", $from, 'Thank you for choosing us Star Supermarket')
                // );
                
                // $message = $response->current();
                
                // if ($message->getStatus() == 0) {
                    for ($i = 0; $i < $row; $i++)
                    {
                        $dataSave =[
                            'customerName' => $request->buyerName,
                            'customerEmail' => $request->buyerEmail,
                            'phone' => $request->phone,
                            'country' => $request->country,
                            'productNo' => $request->proNo[$i],
                            'TicketNo' => $invoice,
                            'quant' => $request->quantity[$i],
                            'city' => $request->city,
                            'address' => $request->address,
                            'status' => 0,
                            'by'=> '',
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        ];DB::table('customers')->insert($dataSave);
        
                        for($j = 0; $j < $size; $j++){
                            if($store[$j]->productNo == $request->proNo[$i]){
                                $remaining = $store[$j]->quantity - $request->quantity[$i];
                                $sold = $store[$j]->sold + $request->quantity[$i];
                                $update = Store::where('productNo', '=', $request->proNo[$i])
                                ->update([
                                    'sold' => $sold,
                                    'quantity' => $remaining
                                ]);
                            }
                        }
                    }
                    Session::put("success", $invoice);
                    return redirect('/star');
                // } else {
                //     dd("The message failed with status: " . $message->getStatus() );
                // }
            }
            // setcookie("message", "yess"); //to remove cookie after sending message
        // Single Product Buying
        }else{
            $total = intval(100 * $request->totalPrice);
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $stripe = Stripe\Charge::create([
                "amount" => $total,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Single Item Paying",
                "metadata" => array("customer"=>$request->buyerEmail, "name"=>$request->buyerName, "country" => $request->country)
            ]);

            if($stripe){
                // $basic  = new \Vonage\Client\Credentials\Basic("9ca7210f", "Dl9eqgOqBj4Ix7GR");
                // $client = new \Vonage\Client($basic);
                
                // $from = "Vonage APIs";
                // $response = $client->sms()->send(
                //     new \Vonage\SMS\Message\SMS("251936231225", $from, 'Thank you for choosing us Star Supermarket')
                // );
                
                // $message = $response->current();
                
                // if ($message->getStatus() == 0) {
                    $store =  DB::table('stores')->get();
                    $size = count($store);
    
                    $customer = new Customer();
                        $customer->customerName = request('buyerName');
                        $customer->customerEmail = request('buyerEmail');
                        $customer->country = request('country');
                        $customer->phone = request('phone');
                        $customer->productNo = request('proNo');
                        $customer->quant = request('quantity');
                        $customer->TicketNo = $invoice;
                        $customer->city = request('city');
                        $customer->address = request('address');
                        $customer->status = 0;
                        $customer->by = '';
                        $customer->save();
    
                    for($j = 0; $j < $size; $j++){
                        if($store[$j]->productNo == request('proNo')){
                            $remaining = $store[$j]->quantity - request('quantity');
                            $sold = $store[$j]->sold + request('quantity');
    
                            $update = Store::where('productNo', '=', request('proNo'))
                            ->update([
                                'sold' => $sold,
                                'quantity' => $remaining
                            ]);
                        }
                    }
                    
                    Session::put("success", $invoice);
                    return redirect('/star');
    
                // } else {
                //     dd("The message failed with status: " . $message->getStatus());
                // //     echo "The message failed with status: " . $message->getStatus() . "\n";
                // }
            }
    
        }
    }

    // Dashboard Controller
    public function dashboard(){

        $customer = DB::table('customers')
                ->where('customerEmail','=', session('user-email'))
                ->get();
                
        $quant = [];
        $proNo = [];
        foreach ($customer as $user)
        {
            $quant[] = $user->quant;
            $proNo[] = $user->TicketNo;
            $product[] = $user->productNo;
        }
        $productDetail = [];
        if($customer){
            for ($i = 0; $i < count($customer); $i++){
                $productDetail[] = DB::table('stores')
                ->where('productNo', '=', $product[$i])
                ->get();
            }

            return view("Pages.dashboard.overview", [
                'quantity' => $quant, 
                'proDetails' => $productDetail, 
                'ticket'=>$proNo, 
                'customer'=>$customer
            ]);
        }
    }
    public function orders(){
        $customer = DB::table('customers')
                ->where('customerEmail','=', session('user-email'))
                ->get();

        $status = [];
        $date = [];
        $quant = [];
        $product = [];
        $proNo = [];
        foreach ($customer as $user)
        {
            $status[] = $user->status;
            $quant[] = $user->quant;
            $date [] = $user->created_at;
            $proNo[] = $user->TicketNo;
            $product[] = $user->productNo;
        }
        $productDetail = [];
        if($customer){
            for ($i = 0; $i < count($customer); $i++){
                $productDetail[] = DB::table('stores')
                ->where('productNo', '=', $product[$i])
                ->get();
            }
            return view("Pages.dashboard.orders", 
            [
                'quantity' => $quant, 
                'proDetails' => $productDetail, 
                'ticket'=>$proNo,
                'status' => $status,
                'date' => $date
            ]);
        }
    }
    public function profile(){
        return view("Pages.dashboard.profile");
    }
    public function logout(){
        session()->remove('user-name');
        session()->remove('user-email');
        session()->remove('user-country');
        session()->remove('user-city');
        session()->remove('user-address');
        session()->remove('user_logged');
        return redirect('/star');
    }
    //  Update Profile
    public function update(Request $request){
        // Password change
        if(isset($request['done'])){
            $this->validate($request, [
                'currentPassword' => 'required',
                'newPassword' => 'required|min:6'
            ]);
            
            $userChange = DB::table('users')
                ->where('username', '=', session('user-name'))  
                ->where('email', '=', session('user-email'))
                ->where('password', '=', md5($request['currentPassword']))
                ->update([
                    'password' => md5($request['newPassword']),
                ]);

            

            if($userChange) return redirect('account/login');
        }
        // full Profile change 
        else{
            $this->validate($request, [
                'username' => 'required',
                'userEmail' => 'required',
                'currentPassword' => 'required',
                'country' => 'required',
                'newAddress' => 'required',
                'city' => 'required'
            ]);
        
            $userUpdate = DB::table('users')
                ->where('username', '=', session('user-name'))
                ->where('email', '=', session('user-email'))
                ->get();

            if($userUpdate[0]->password === md5($request['currentPassword'])){

                if($userUpdate[0]->email != $request['userEmail'] && 
                    $userUpdate[0]->username !== $request['username'])
                {
                        $this->validate($request, [
                            'username' => 'min:3|unique:users,username',
                            'userEmail' => 'unique:users,email',
                        ]);  
                        
                } else if ($userUpdate[0]->username != $request['username'] &&
                            $userUpdate[0]->email === $request['userEmail']) 
                {
                    $this->validate($request, [
                        'username' => 'min:3|unique:users,username',
                        'userEmail' => 'required',
                    ]);

                } else if ($userUpdate[0]->username === $request['username'] &&
                            $userUpdate[0]->email != $request['userEmail']) 
                {
                    $this->validate($request, [
                        'username' => 'required',
                        'userEmail' => 'unique:users,email',
                    ]);
                }
                
                $updateAll = DB::table('users')
                    ->where('username', '=', session('user-name'))
                    ->where('email', '=', session('user-email'))
                    ->where('password', '=', md5($request['currentPassword']))
                    ->update([
                        'username' => $request['username'],
                        'email' => $request['userEmail'],
                        'country' => $request['country'],
                        'address' => $request['newAddress'],
                        'city' => $request['city']
                    ]);
                
                if($updateAll)
                {
                    $customerProfile = DB::table('customers')
                        ->where('customerName', '=', session('user-name'))
                        ->where('customerEmail', '=', session('user-email'))
                        ->get();

                    if(count($customerProfile) >= 1){
                        $updateCustomerProfile = DB::table('customers')
                            ->where('customerName', '=', session('user-name'))
                            ->where('customerEmail', '=', session('user-email'))
                            ->update([
                                'customerName' => $request['username'],
                                'customerEmail' => $request['userEmail'],
                                'country' => $request['country'],
                                'address' => $request['newAddress'],
                                'city' => $request['city']
                            ]);
                    }

                    session()->remove('user-name');
                    session()->remove('user-email');

                    session(['user-name' => $request['username']]);
                    session(['user-email' => $request['userEmail']]);

                    return back()->with('successMsg', 'Profile Updated');
                }else
                {
                    return back()->with('errorMsg', 'Invalid Password');
                }
            }else
            {
                return back()->with('errorMsg', 'Invalid Password');
            }
        }
    }
}
