<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Log;
use DB;
use Session;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use App\Models\Products;
use App\Models\Categories;
use App\Models\TblWebSetting;
use App\Models\Cart;

class DashboardController extends Controller
{
    public function home()
    {
        $title = "Product List";
        $logo = TblWebSetting::where('set_id', '1')->first();

        $productData = Products::with('Categories', 'ProductImages', 'ProductVariantwithRatings')
            ->where('approved', 1)
            ->orderBy('product_id', 'desc')
            ->take(10)
            ->get();

        $popular_product_list = array();
        foreach ($productData as $key => $product) {
            $product->rate_id = 0;
            $product->rating = 0;
            $product->varient_id = 0;
            if (!empty($product->ProductVariantwithRatings)) {
                $product->varient_id = $product->ProductVariantwithRatings->varient_id;
                $ProductRatings =  $product->ProductVariantwithRatings->ProductRatings;
                if (count($ProductRatings) > 0) {
                    foreach ($ProductRatings as $Ratekey => $ratevalue) {
                        $product->rate_id = $ratevalue->rate_id;
                        $product->rating =  $ratevalue->rating;
                    }
                }
            }
            if (!in_array($product, $popular_product_list, true)) {
                array_push($popular_product_list, $product);
            }
        }

        $DailyBestSells = Products::with('Categories', 'ProductImages', 'ProductVariantwithRatings')
            ->where('approved', 1)
            ->orderBy('product_id', 'desc')
            ->take(20)
            ->get();

        $DailyBestSellsProduct = array();
        foreach ($DailyBestSells as $key => $product) {
            $product->rate_id = 0;
            $product->rating = 0;
            $product->varient_id = 0;
            if (!empty($product->ProductVariantwithRatings)) {
                $product->varient_id = $product->ProductVariantwithRatings->varient_id;
                $ProductRatings =  $product->ProductVariantwithRatings->ProductRatings;
                if (count($ProductRatings) > 0) {
                    foreach ($ProductRatings as $Ratekey => $ratevalue) {
                        $product->rate_id = $ratevalue->rate_id;
                        $product->rating =  $ratevalue->rating;
                    }
                }
            }
            if (!in_array($product, $DailyBestSellsProduct, true)) {
                array_push($DailyBestSellsProduct, $product);
            }
        }

        $CategoriesData = Categories::with('Products')->get();
        $CategoriesList = array();
        foreach ($CategoriesData as $Catkey => $Catvalue) {
            $Catvalue->productitems = 0;
            if (count($Catvalue->Products) > 0) {
                $Catvalue->productitems = count($Catvalue->Products);
            }
            if (!in_array($Catvalue, $CategoriesList, true)) {
                array_push($CategoriesList, $Catvalue);
            }
        }
        $product_count = count($popular_product_list);
        return view('front.home', compact('popular_product_list', 'logo', 'product_count', 'CategoriesList', 'DailyBestSellsProduct'));
    }

    public function login()
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            return view('front.home');
        } else {
            return view('front.login');
        }
    }

    public function login_process(Request $request)
    {
        // dd('login_process', $request->all());
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            return view('front.home');
        } else {

            $this->validate($request, [
                'email'   => 'required|email',
                'password' => 'required|min:8',
            ]);
            $email = !empty($request->email) ? $request->email : '';
            $password = !empty($request->password) ? $request->password : '';

            if (Auth::guard('users')->attempt([
                'email' => $email,
                'password' => $password,
            ], $request->get('remember'))) {
                $users = Auth::guard('users')
                    ->login(Auth::guard('users')->user(), true);
                $request->session()->regenerate();
                return redirect()->intended('front/home');
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);

            if (!$users) {
                return redirect()->route('front.home.register')->with('error', 'Something Went Wrong');
            }
            return redirect()->route('front.home.register')->with('success', 'User Create successfully.');
        }
    }

    public function register()
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            return view('front.home');
        } else {
            return view('front.register');
        }
    }

    public function register_store(Request $request)
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            return view('front.home');
        } else {

            $this->validate($request, [
                'name' => 'required',
                'email'   => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'confirm_password' => 'required|min:8',
                'remember' => 'required',
                'user_phone' => 'required',
                'user_city' => 'required',
            ]);

            $name = !empty($request->name) ? $request->name : '';
            $email = !empty($request->email) ? $request->email : '';
            $password = !empty($request->password) ? $request->password : '';
            $confirm_password = !empty($request->confirm_password) ? $request->confirm_password : '';
            $payment_option = !empty($request->payment_option) ? $request->payment_option : '';
            $agree_terms_policy = !empty($request->agree_terms_policy) ? $request->agree_terms_policy : '';

            $users = new Users();
            $users->name = !empty($request->name) ? $request->name : '';
            $users->email = !empty($request->email) ? $request->email : '';
            $users->password = !empty($request->password) ? Hash::make($request->password) : '';
            $users->user_phone = !empty($request->user_phone) ? $request->user_phone : '';
            $users->user_city = !empty($request->user_city) ? $request->user_city : '';
            $users->save();

            if (!$users->save()) {
                return redirect()->route('front.home.register')->with('error', 'Something Went Wrong');
            }
            return redirect()->route('front.home.register')->with('success', 'User Create successfully.');
        }
    }

    public function logout(Request $request)
    {
        if (Auth::guard('users')->check()) {
            $user = Auth::guard('users')->user();
            Auth::guard('users')->logout();
            return redirect()->route('front.home.login');
        }
    }
}
