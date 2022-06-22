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
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MyAccountController extends Controller
{
    public function my_account()
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            // dd($users);
            return view('front.my_account.index', compact('users'));
        } else {
            return view('front.login');
        }
    }

    public function update_profile(Request $request)
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email',
                'user_phone' => 'required|min:10|max:12',
                'user_city' => 'required',
                'user_area' => 'required',
            ]);
            $user_profile = '';
            if ($request->hasFile('user_image')) {
                $file = $request->file('user_image');
                $directory_path = config('constants.STORAGE_USER_IMAGE_PATH');
                //you also need to keep file extension as well
                $user_profile = 'user_image_' . time() . '.' . $file->getClientOriginalExtension();
                // Storage::put($directory_path . $user_profile, file_get_contents($file->getRealPath()));
                Storage::disk('public')->put($directory_path . $user_profile, file_get_contents($file->getRealPath()));
                //using the array instead of object
                $user_profile = $user_profile;
                // dd($user_profile);
            }

            $users->name = !empty($request->name) ? $request->name : '';
            $users->email = !empty($request->email) ? $request->email : '';
            $users->user_phone = !empty($request->user_phone) ? $request->user_phone : '';
            $users->user_city = !empty($request->user_city) ? $request->user_city : '';
            $users->user_area = !empty($request->user_area) ? $request->user_area : '';
            $users->user_image = $user_profile;
            $users->save();

            if (!$users->save()) {
                return redirect()->route('front.my_account')->with('error', 'Something Went Wrong');
            }
            return redirect()->route('front.my_account')->with('success', 'Update Successfully.');
        } else {
            return view('front.login');
        }
    }

    public function wishlist()
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            return view('front.my_account.wishlist', compact('users'));
        } else {
            return view('front.login');
        }
    }

    public function RemoveProductInCart($cartId)
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            $cartData = Cart::where('cart_id', $cartId)->delete();
            return redirect()->route('front.cart')->with('success', 'Remove product Successfully.');
        } else {
            return view('front.login');
        }
    }

    public function clear_cart($userId)
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            $cartData = Cart::where('user_id', $users->id)->delete();
            return redirect()->route('front.cart')->with('success', 'Cart Clear Successfully.');
        } else {
            return view('front.login');
        }
    }

    public function cart()
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            $cartData = Cart::where('user_id', $users->id)->get();
            $product_list = array();
            $subtotal = 0;
            foreach ($cartData as $cartkey => $Cartvalue) {
                $product_id = $Cartvalue->product_id;
                $product = Products::with('Categories', 'ProductImages', 'ProductVariantwithRatings')
                    ->where('product_id', $Cartvalue->product_id)
                    ->where('approved', 1)
                    ->orderBy('product_id', 'desc')
                    ->first();

                $product->rate_id = 0;
                $product->rating = 0;
                $product->varient_id = 0;
                $product->quantity = $Cartvalue->qty;
                $product->cart_id = $Cartvalue->cart_id;
                $product->ProductVariantwithRatings->base_price;
                $subtotal += $Cartvalue->qty * $product->ProductVariantwithRatings->base_price;
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
            return view('front.my_account.cart', compact('users', 'product_list', 'subtotal'));
        } else {
            return view('front.login');
        }
    }

    public function checkout()
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {
            $cartData = Cart::where('user_id', $users->id)->get();
            $product_list = array();
            $subtotal = 0;
            foreach ($cartData as $cartkey => $Cartvalue) {
                $product_id = $Cartvalue->product_id;
                $product = Products::with('Categories', 'ProductImages', 'ProductVariantwithRatings')
                    ->where('product_id', $Cartvalue->product_id)
                    ->where('approved', 1)
                    ->orderBy('product_id', 'desc')
                    ->first();

                $product->rate_id = 0;
                $product->rating = 0;
                $product->varient_id = 0;
                $product->quantity = $Cartvalue->qty;
                $product->cart_id = $Cartvalue->cart_id;
                $product->ProductVariantwithRatings->base_price;
                $subtotal += $Cartvalue->qty * $product->ProductVariantwithRatings->base_price;
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
            return view('front.my_account.checkout', compact('users', 'product_list', 'subtotal'));
        } else {
            return view('front.login');
        }
    }

    public function update_cart(Request $request)
    {
        $users = Auth::guard('users')->user();
        if (!empty($users)) {

            $user_id = $users->id;
            $postrequest = $request->all();
            foreach ($postrequest as $keyID => $Qtyvalue) {
                $cart = Cart::where('product_id', $keyID)
                    ->where('user_id', $user_id)
                    ->update(['qty' => $Qtyvalue]);
            }
            return redirect()->route('front.cart')->with('success', 'Update Successfully.');
        } else {
            return view('front.login');
        }
    }
}
