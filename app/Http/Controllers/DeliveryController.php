<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Customer;

class DeliveryController extends Controller
{
    public function showLogin(){
        return view("Pages.employee.deliveryAuth");
        // return view("Pages.deliveryAuth");
    }

    public function login (Request $request){
        $this->validate($request, [
            'email' => 'required|min:14',
            'password' => 'required|min:5',
        ]);
            $delivery = DB::table('employees')
                        ->where('role', '=', 'delivery')
                        ->where('email', '=', $request['email'])
                        ->where('password', '=', md5($request['password']))
                        ->first();

            if($delivery){
                session()->put('delivery_logged', true);
                session(['delivery-user' => $delivery->username]);
                session(['delivery-city' => $delivery->city]);
                return redirect('star/delivery');
            }else{
                return back()->with('error', "Invalid Email and Password"); 
            }
    }

    public function delivery(){
        $city = session('delivery-city');

        $match = DB::table('customers')
        ->where('city', '=', $city)
        ->where('status', '<', 2)
        ->get();

        // dd($match);
        
        if($match){
            $date = [];
            $userEmail = [];
            $userPhone = [];
            $userCity = [];
            $userAddress = [];
            $userName= []; 
            $userId = [];
            $quant = [];
            $proNo = [];
            $product = [];
            $status = [];

            foreach ($match as $found)
            {   
                $userEmail[] = $found->customerEmail;
                $userPhone[] = $found->phone;
                $userCity[] = $found->city;
                $userAddress[] = $found->address;
                $userName[] = $found->customerName; 
                $userId[] = $found->id;
                $quant[] = $found->quant;
                $proNo[] =$found->TicketNo;
                $product[] = $found->productNo;
                $status[] = $found->status;
                $date[] = $found->created_at;
            }

            $productDetail = [];
            if($match){
                for ($i = 0; $i < count($match); $i++){
                    $productDetail[] = DB::table('stores')
                    ->where('productNo', '=', $product[$i])
                    ->get();
                }
            }

            $test = DB::table('customers')
                    ->select(DB::raw('(TicketNo)'))
                    ->where('city', '=', $city)
                    ->where('status', '<', 2)
                    ->groupBy('TicketNo')
                    ->orderByRaw('id')
                    ->get();


            return view("Pages.employee.delivery",
            [
                'quantity' => $quant, 
                'proDetails' => $productDetail, 
                'ticket' => $proNo, 
                'customer' => $match,
                'value' => $test,
                'name' => $userName,
                'email' => $userEmail,
                'city' => $userCity,
                'phone' => $userPhone,
                'address' => $userAddress,
                'id' => $userId,
                'status' => $status,
                'date' => $date
            ]);
        }
    }

    public function profile(){
        $delivery = DB::table('employees')
            ->where('username', '=', session('delivery-user'))
            ->where('city', '=', session('delivery-city'))
            ->get();
        return view("Pages.employee.deliverProfile", ['delivery' => $delivery]);
    }

    public function update(Request $request){
        if(isset($request['change'])){
            $this->validate($request, [
                'current-password' => 'required',
                'new-password' => 'required|min:5'
            ]);

            $updatePassword = DB::table('employees')
                ->where('role', '=', $request['role'])
                ->where('username', '=', session('delivery-user'))
                ->where('city', '=', session('delivery-city'))
                ->where('password', '=', md5($request['current-password']))
                ->get();
                
            
            if(count($updatePassword) === 1){
                DB::table('employees')
                    ->where('role', '=', $request['role'])
                    ->where('username', '=', session('delivery-user'))
                    ->where('city', '=', session('delivery-city'))
                    ->update(['password' => md5($request['new-password'])]);

                session()->remove('delivery-user');
                session()->remove('delivery-city');
                session()->remove('delivery_logged');
    
                return redirect('star/delivery-login');
            }else{
                return back()->with('errorPass', 'Invalid Password');
            }

        }else{
            $this->validate($request, [
                'username'=>'required',
                'email'=>'required',
                'password'=>'required|min:5',
                'country'=>'required',
                'address'=>'required',
                'tel'=>'required',
                'sex'=>'required',
                'city'=>'required',
            ]);

            $deliveryUpdateAll = DB::table('employees')
                ->where('role', '=', $request['role'])
                ->where('username', '=', session('delivery-user'))
                ->where('city', '=', session('delivery-city'))
                ->get();

            if($deliveryUpdateAll[0]->password == md5($request['password'])){

                if($deliveryUpdateAll[0]->email != $request['email'] && 
                    $deliveryUpdateAll[0]->username !== $request['username'])
                {
                        $this->validate($request, [
                            'username' => 'unique:employees,username',
                            'email' => 'unique:employees,email',
                        ]);  
                        
                } else if ($deliveryUpdateAll[0]->username != $request['username'] &&
                            $deliveryUpdateAll[0]->email === $request['email']) 
                {
                    $this->validate($request, [
                        'username' => 'unique:employees,username',
                        'email' => 'required',
                    ]);

                } else if ($deliveryUpdateAll[0]->username === $request['username'] &&
                            $deliveryUpdateAll[0]->email != $request['email']) 
                {
                    $this->validate($request, [
                        'username' => 'required',
                        'email' => 'unique:employees,email',
                    ]);
                }
                
                $updateAll = DB::table('employees')
                    ->where('role', '=', $request['role'])
                    ->where('username', '=', session('delivery-user'))
                    ->where('city', '=', session('delivery-city'))
                    ->where('password', '=', md5($request['password']))
                    ->update([
                        'username' => $request['username'],
                        'email' => $request['email'],
                        'sex' => $request['sex'],
                        'country' => $request['country'],
                        'address' => $request['address'],
                        'tel' => $request['tel'],
                        'city' => $request['city']
                    ]);
                
                if($updateAll)
                {
                    DB::table('customers')
                        ->where('by', '=', session('delivery-user'))
                        ->update(['by' => $request['username']]);

                    session()->remove('delivery-user');
                    session()->remove('delivery-city');

                    session(['delivery-user' => $request['username']]);
                    session(['delivery-city' => $request['city']]);
                    return back()->with('successMsg', 'Profile Updated');
                }else
                {
                    return back()->with('errorMsg', 'Invalid Password');
                }
            }else{
                return back()->with('errorMsg', 'Invalid Password');
            }    
        }
    }

    public function status(Request $request){
        if($request->submit == "delivered"){
            $update = DB::table('customers')
                    ->where('TicketNo', '=' , $request['ticket'])
                    ->update([
                        'status' => 2,
                        'By' => $request['deliveredBy']
                    ]);
            return back()->with('delivered', 'Good Work');

        }else if ($request->submit == "on-road"){
            $update = DB::table('customers')
                    ->where('TicketNo', '=' , $request['ticket'])
                    ->update([
                        'status' => 1,
                        'By' => $request['deliveredBy']
                    ]);
            return back()->with('on-road', 'Safe Trip');
        }
    }

    public function logout(){
        session()->remove('user');
        session()->remove('delivery_logged');

        return redirect('star/delivery-login');
    }
}
