<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Auth;
use Log;
use Session;
use Carbon\Carbon;

use App\Models\Products;
use App\Models\Categories;
use App\Models\TblWebSetting;
use App\Models\Cart;

class FrontendPagesController extends Controller
{
    public function about_us()
    {
        return view('front.about_us');
    }

    public function contact_us()
    {
        return view('front.contact_us');
    }

    public function purchase_guide()
    {
        return view('front.purchase_guide');
    }

    public function privacy_policy()
    {
        return view('front.privacy_policy');
    }

    public function terms_services()
    {
        return view('front.terms_and_services');
    }

    public function shop()
    {
        $title = "Product List";
        $logo = TblWebSetting::where('set_id', '1')->first();

        $productData = Products::with('Categories', 'ProductImages', 'ProductVariantwithRatings')
            ->where('approved', 1)
            ->orderBy('product_id', 'desc')
            ->paginate(20);

        $product_list = array();
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
            if (!in_array($product, $product_list, true)) {
                array_push($product_list, $product);
            }
        }

        $product_count = count($productData);
        return view('front.shop', compact('productData', 'logo', 'product_count'));
    }

    public function GetProduct(Request $request)
    {
        $productData = Products::with('Categories', 'ProductImages', 'ProductVariantwithRatings')
            ->where('approved', 1)
            ->orderBy('product_id', 'desc')
            ->paginate(10);
        $html = '';
        if ($productData > 0) {
            $html = view('front.product_list', compact('productData'))->render();
        }

        $response = [
            'html' => $html,
        ];
        return response()->json($response);
    }

    public function addToCart(Request $request, $productId, $varientId)
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            $cart = new Cart();
            $cart->product_id = $productId;
            $cart->varient_id = $varientId;
            $cart->user_id = $users->id;
            $cart->qty = 1;
            $cart->save();

            if (!$cart->save()) {
                return redirect()->route('front.shop')->with('error', 'Something Went Wrong');
            }
            return redirect()->route('front.shop')->with('success', 'Add To cart Successfully.');
        } else {
            return view('front.login');
        }
    }

    public function vendor_list()
    {
        return view('front.vendor_list');
    }

    public function vendor_guide()
    {
        return view('front.vendor_guide');
    }

    public function blog_list()
    {
        return view('front.blog_list');
    }
}
