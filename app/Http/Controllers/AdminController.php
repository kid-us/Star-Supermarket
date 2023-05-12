<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Site;
use App\Models\Employee;
use DB;


class AdminController extends Controller
{
    public function showLogin(){
        return view('Pages.employee.adminAuth');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|min:14',
            'password' => 'required|min:5',
        ]);

            $admin = DB::table('employees')
                        ->where('role', '=', 'admin')
                        ->where('email', '=', $request['email'])
                        ->where('password', '=', md5($request['password']))
                        ->first();
    
            if($admin){
                session()->put('admin_logged', true);
                session(['admin-user' => $admin->username]);
                return redirect('admin/dashboard');
            }else{
                return back()->with('error', "Invalid Email and Password"); 
            }

    }

    // Admin Page
    public function dash(){
        // counts
        $all = count(DB::table('stores')->get());
        $outOfStock = count(DB::table('stores')->where('quantity', '=', 0)->get());
        $sales = DB::table('stores')->where('quantity', '=', 0)->get();
        $sum = 0;
        foreach($sales as $tot){
            $sum += $tot->price * $tot->sold;
        }
        // dd($all);

        $allCustomers =count(DB::table('customers')->get());
        $dash =  DB::table('stores')->get()->take(5);
        $ended =  DB::table('stores')->where('quantity', '<', 50)->get()->take(4);
        $sold =  DB::table('stores')->where('sold', '>=', 50)->get()->take(7);
        $customers = DB::table('customers')->get()->take(10);
        $users = DB::table('users')->get()->take(9);
        return view("Pages.admin.dashboard",[
            'dash' => $dash, 
            'sold' => $sold,
            'end' => $ended, 
            'customer'=> $customers,
            'users'=> $users,
            'outof' => $outOfStock,
            'sales' => $sum,
            'all' => $all,
            'customerNum' => $allCustomers
        ]);
    }

    public function employee(){
        $employee = DB::table('employees')->where('role', '=', 'delivery')
        ->get();

        return view("Pages.admin.employee", ['employee' => $employee]);
    }

    public function form(){
        $related = DB::table('stores')->get();
        
        return view("Pages.admin.forms", ['store' => $related]);
    }   

    public function table(){
        $dash =  DB::table('stores')->get();
        $ended =  DB::table('stores')->where('quantity', '<', 50)->get();
        $sold =  DB::table('stores')->where('sold', '>=', 50)->get();
        $customers = DB::table('customers')->get();
        $users = DB::table('users')->get();
        return view("Pages.admin.table",[
            'dash' => $dash, 
            'sold' => $sold,
            'end' => $ended, 
            'users' => $users,
            'customer'=> $customers,
        ]);
        // return view("Pages.admin.table");
    }

    public function profile(){
        $admin = DB::table('employees')->where('role', '=', 'admin')->get();

        return view("Pages.admin.profile", ['admin' => $admin]);
    }

    public function gallery(){
        return view("Pages.admin.gallery");
    }

    public function site(){
        $site = DB::table('sites')->get();
        return view("Pages.admin.site", ['site' => $site]);
    }

    // Profile update(change)
    public function profileUpdate(Request $request){
        if(isset($request['change'])){
            $this->validate($request, [
                'current-password' => 'required',
               'new-password' => 'required|min:5'
            ]);

            $updatePassword = DB::table('employees')->where('role', '=', 'admin')
            ->where('password', '=', md5($request['current-password']))
            ->update([
                'password' =>  md5($request['new-password'])
            ]);

            if($updatePassword){
                session()->remove('admin-user');
                session()->remove('admin_logged');
        
                return redirect('admin/login');
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

            $adminUpdate = DB::table('employees')
                ->where('role', '=', 'admin')
                ->where('username', '=', session('admin-user'))
                ->get();

            if($adminUpdate[0]->password == md5($request['password'])){
                if($adminUpdate[0]->email != $request['email'] && 
                $adminUpdate[0]->username !== $request['username'])
                {
                    $this->validate($request, [
                        'username' => 'unique:employees,username',
                        'email' => 'unique:employees,email',
                    ]);  
                    
                } else if ($adminUpdate[0]->username != $request['username'] &&
                        $adminUpdate[0]->email === $request['email']) 
                {
                    $this->validate($request, [
                        'username' => 'unique:employees,username',
                        'email' => 'required',
                    ]);

                } else if ($adminUpdate[0]->username === $request['username'] &&
                            $adminUpdate[0]->email != $request['email']) 
                {
                    $this->validate($request, [
                        'username' => 'required',
                        'email' => 'unique:employees,email',
                    ]);
                }

                $update = DB::table('employees')
                ->where('role', '=', 'admin')
                ->where('username', '=', session('admin-user'))
                ->where('password', '=', md5($request['password']))
                ->update([
                    'username' => $request['username'],
                    'email' => $request['email'],
                    'sex' => $request['sex'],
                    'country' => $request['country'],
                    'address' => $request['address'],
                    'tel' => $request['tel'],
                    'city' => $request['city'],
                ]);

                if($update){
                    session()->remove('admin-user');
                    session(['admin-user' => $request['username']]);
                    return back()->with('successMsg', 'Profile changed or Updated');
                }else {
                return back()->with('errorMsg', 'Invalid Password');
                }
            }  else {
                return back()->with('errorMsg', 'Invalid Password');
            } 
        }
    }

    // upload
    Public function upload(Request $request){
        $this->validate($request, [
            'item-name'=>'required|unique:stores,product',
            'catagories'=>'required',
            'quantity'=>'required',
            'price'=>'required',
            'info'=>'required|min:50|max:255',
            'image'=>'required|image|mimes:png|max:2048|unique:stores,image'
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $ran = rand(10000,50000);

        $store = new Store();
            $store->product = request('item-name');
            $store->category = request('catagories');
            $store->image = $imageName;
            $store->quantity = request('quantity');
            $store->price = request('price');
            $store->delPrice = request('del-price');
            $store->productNo = $ran;
            $store->sold = 0;
            $store->type = request('type');
            $store->description = request('info');
            $store->pricePer = request('price-per');

            $store->save();

        return back()->with('success', 'Product '.$request['item-name'].' uploaded Successfully!')
        ->with('image', $imageName);

    }

    // update store products
    public function change(Request $request){
        
        if(isset($request['del'])){

            $this->validate($request, [
                'editProduct'=>'required',
                'editPrice'=>'required',
                'editDelPrice'=>'required',
                'editQuantity'=>'required',
            ]);

            $delete = DB::table('stores')->where('productNo', '=' , $request['productNo'])
            ->delete();

            if($delete){
                return back()->with('deleted', 'Product ' .$request['editProduct']. ' Removed successfully');
            }else{
                return back()->with('error', 'Something is Wrong');
            }
            
        }else{

            $this->validate($request, [
                'editProduct'=>'required',
                'editPrice'=>'required',
                // 'editPricePer'=>'required',
                // 'editDelPrice'=>'required',
                'editQuantity'=>'required',
            ]);

            $get = DB::table('stores')->where('productNo', '=' , $request['productNo'])->get();
            if($get[0]->product == $request['editProduct']){
                $update = DB::table('stores')->where('productNo', '=' , $request['productNo'])
                ->update([
                    'product' => $request['editProduct'],
                    'price' => $request['editPrice'],
                    'delPrice' => $request['editDelPrice'],
                    'quantity' => $request['editQuantity'],
                    'pricePer' => $request['editPricePer'],
                ]);

                if($update){
                    return back()->with('updated', 'Updated Successfully');
                }else{
                    return back()->with('error', 'Something is Wrong');
                }
                
            }else{
                $this->validate($request, [
                    'editProduct'=>'required|unique:stores,product',
                ]);

                $update = DB::table('stores')->where('productNo', '=' , $request['productNo'])
                ->update([
                    'product' => $request['editProduct'],
                    'price' => $request['editPrice'],
                    'delPrice' => $request['editDelPrice'],
                    'quantity' => $request['editQuantity']
                ]);
                if($update){
                    return back()->with('updated', 'Updated Successfully');
                }else{
                    return back()->with('error', 'Something is Wrong');
                }
            }
        }
    }

    // fire
    public function fire(Request $request){

        $deleted = DB::table('employees')->where('email', '=', $request['fire-email'])
        ->where('username', '=' , $request['fire-username'])
        ->delete();

        if($deleted){
            return back()->with('deleted', 'Employee '.$request['fire-username'] .' has fired');
        }

    }

    // hire
    Public function hire(Request $request){
        $this->validate($request, [
            'username'=>'required|unique:employees,username',
            'role'=>'required',
            'email'=>'required|unique:employees,email',
            'password'=>'required|min:5',
            'country'=>'required',
            'address'=>'required',
            'tel'=>'required',
            'con-password'=>'required',
            'sex'=>'required',
            'city' => 'required'
        ]);

        $employee = new Employee();
        if($request['password'] === $request['con-password']){
           $employee->username = request('username');
           $employee->role = request('role');
           $employee->email = request('email');
           $employee->password = md5(request('password'));
           $employee->country = request('country');
           $employee->address = request('address');
           $employee->city = request('city');
           $employee->tel = request('tel');
           $employee->sex = request('sex');
           $employee->save();
            return back()->with('success','New employee Hired Successfully');
        }else{
            return back()->with('error' , "Password does not match");
        }
    }

    // sie setting
    public function siteSetting(Request $request){
        if($request->submit == "upload")
        {
            $this->validate($request, [
                'imageFor'=>'required',
                'siteImage'=>'required'
            ]);

            $site = DB::table('sites')
            ->where('sloganFor', '=', $request['imageFor'])
            ->get();

            if(count($site) == 1)
            {
                $imageName = time().'.'.$request->siteImage->extension();
                $request->siteImage->move(public_path('site'), $imageName);

                DB::table('sites')
                ->where('sloganFor', '=', $request['imageFor'])
                ->update([
                    'imageFor' => $request['imageFor'],
                    'image' => $imageName
                ]);

                return back()->with('uploaded', 'Uploaded');
            }
            else {
                $imageName = time().'.'.$request->siteImage->extension();
                $request->siteImage->move(public_path('site'), $imageName);
                
                $site = new Site();
                $site->imageFor = request('imageFor');
                $site->image = $imageName;
                $site->sloganFor = "";
                $site->slogan = "";
                $site->save();

                return back()->with('uploaded', 'Uploaded');
            }
        } 

        elseif($request->submit == "sloganBtn")
        {
            $this->validate($request, [
                'sloganFor'=>'required',
                'slogan'=>'required'
            ]);   

            $site = DB::table('sites')
            ->where('imageFor', '=', $request['sloganFor'])
            ->get();

            if(count($site) == 1)
            {
                DB::table('sites')
                ->where('imageFor', '=', $request['sloganFor'])
                ->update([
                    'sloganFor' => $request['sloganFor'],
                    'slogan' => $request['slogan']
                ]);

                return back()->with('slogan', 'Completed');
            } else {
                $site = new Site();
                    $site->imageFor = "";
                    $site->image = "";
                    $site->sloganFor = request('sloganFor');
                    $site->slogan = request('slogan');
                    $site->save();

                return back()->with('slogan', 'Completed');
            }
        }
    }    

    // search
    public function search(Request $request){
        $this->validate($request, [
            'search' => 'required',
            'find' => 'required|min:3'
        ]);

        if ($request['search'] === 'product'){
            $product = DB::table('stores')
            ->where('product', '=', $request['find'])
            ->orWhere('productNo', '=', $request['find'])
            ->get();

            if(count($product) === 1){
                $name = $product[0]->product;
                $price = $product[0]->price;
                $image = $product[0]->image;
                $category = $product[0]->category;
                $type = $product[0]->type;
                $description = $product[0]->description;
                $proNo = $product[0]->productNo;
                $quantity = $product[0]->quantity;
                
                return back()->with([
                    'name' => $name, 
                    'price' => $price,
                    'category' => $category,
                    'type' => $type,
                    'proNo' => $proNo,
                    'quant' => $quantity,
                    'description' => $description,
                    'image' => $image
                ]);
            
            }else{
                return back()->with('not-found', 'Oppps! There is no product with this name!');
            }
        } elseif ($request['search'] === 'ticket'){
            $ticket = DB::table('customers')
                ->where('TicketNo', '=', $request['find'])
                ->get();

            foreach ($ticket as $t)
            {
                $quant[] = $t->quant;
                $proNo[] = $t->productNo;
            }
            // dd($quant[0]);
            $sum = 0;

            for ($i = 0; $i < count($ticket); $i++){
                $productDetail[] = DB::table('stores')
                ->where('productNo', '=', $proNo[$i])
                ->get();
                // getting total pay of multiple items
                $sum += $productDetail[$i][0]->price * $quant[$i];
            }
            $sum += 10;

            if( count($ticket) >= 1 ){
                return back()->with([
                    'ticket' => $ticket,
                    'buyer-name' => $ticket[0]->customerName,
                    'buyer-email' => $ticket[0]->customerEmail,
                    'buyer-country' => $ticket[0]->country,
                    'buyer-phone' => $ticket[0]->phone,
                    'buyer-city' => $ticket[0]->city,
                    'buyer-address' => $ticket[0]->address,
                    'buyer-ticket-no' => $ticket[0]->TicketNo,
                    'buyer-spend' => $sum,
                    'ticket-status' => $ticket[0]->status,
                    'buyer-date' => $ticket[0]->created_at,
                    'delivered-by' => $ticket[0]->by
                ]);
            }else{
                return back()->with('invalid-ticket','Oppps! invalid ticket number!');
            }
        }
        elseif ($request['search'] === 'customer'){
            $customer = DB::table('customers')
            ->where('customerName', '=', $request['find'])
            ->orWhere('customerEmail', '=', $request['find'])
            ->get();

            if(count($customer) >= 1){
                return back()->with([
                    'customer-name' => $customer[0]->customerName,
                    'customer-email' => $customer[0]->customerEmail,
                    'customer-country' => $customer[0]->country,
                    'customer-phone' => $customer[0]->phone,
                    'customer-city' => $customer[0]->city,
                    'customer-address' => $customer[0]->address,
                    'total' => count($customer)
                ]);
            } else{
                return back()->with('customer-not-found', "Oppps! The is no customer called by  ' ".$request['find']."'");
            }

        }
        return back()->with('result',);
        dd($request['search'] .$request['find']);
    }
    // logout from admin
    public function logout(){
        session()->remove('admin-user');
        session()->remove('admin_logged');

        return redirect('admin/login');
    }
}