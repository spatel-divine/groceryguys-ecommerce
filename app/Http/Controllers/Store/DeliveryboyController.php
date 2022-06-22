<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use Carbon\carbon;
use Auth;

class DeliveryboyController extends Controller
{
    public function list(Request $request)
    {
        $title = "Delivery Boy List";
          $email=Auth::guard('store')->user()->email;
         $store= DB::table('store')
                   ->where('email',$email)
                   ->first();
          $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();  
           $d_boy = DB::table('store_delivery_boy')
                    ->where('store_id', $store->id)
                    ->get();
        
    	return view('store.d_boy.list', compact('title',"store", "logo","d_boy"));
    }

    
     public function AddD_boy(Request $request)
    {
    
        $title = "Add Delivery Boy";
         $email=Auth::guard('store')->user()->email;
         $store= DB::table('store')
                   ->where('email',$email)
                   ->first();
          $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();  
           $d_boy = DB::table('store_delivery_boy')
                  ->where('store_id', $store->id)
                    ->get();
        $city =DB::table('city')
              ->get();
              
         $map1 = DB::table('map_api')
             ->first();
         $map = $map1->map_api_key;      
          $mapset = DB::table('map_settings')
                ->first();
        $mapbox = DB::table('mapbox')
                ->first();
        
        return view('store.d_boy.add',compact("d_boy", "email","logo", "store","title",'map','mapset','mapbox'));
     }
    
     public function AddNewD_boy(Request $request)
    {
        $email=Auth::guard('store')->user()->email;
         $store= DB::table('store')
                   ->where('email',$email)
                   ->first(); 

        $boy_name = $request->boy_name;
        $boy_phone =$request->boy_phone;
        $password = $request->password;
        $boy_loc = $request->boy_loc;
        $status = 1;
        $date=date('d-m-Y');
       
        $addres = str_replace(" ", "+", $boy_loc);
        $address1 = str_replace("-", "+", $addres);
         $mapapi = DB::table('map_api')
                 ->first();
         $mapset= DB::table('map_settings')
                ->first();        
                    
        $chkboyrphon = DB::table('delivery_boy')
                      ->where('boy_phone', $boy_phone)
                      ->first(); 

        if($chkboyrphon){
             return redirect()->back()->withErrors(trans('keywords.This Phone Number Is Already Registered With Another Delivery Boy'));
        } 
                 
        $key = $mapapi->map_api_key;  
        if($mapset->mapbox == 0 && $mapset->google_map == 1){ 
        $response = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address1."&key=".$key));
        
        
         $lat = $response->results[0]->geometry->location->lat;
         $lng = $response->results[0]->geometry->location->lng;
        }
        else{
            $lat = $request->lat;
            $lng = $request->lng;
        }
        
        $this->validate(
            $request,
                [
                    
                    'boy_name' => 'required',
                    'boy_phone' => 'required',
                    'password' => 'required',
                    'boy_loc'=> 'required'
                    
                ],
                [
                    'boy_name.required' => 'Enter Boy Name.',
                    'boy_phone.required' => 'Choose Boy Phone.',
                    'password.required' => 'choose password',
                    'boy_loc.required' => 'enter boy location'
                ]
        );


        $insert = DB::table('delivery_boy')
                            ->insertGetId([
                                'boy_name'=>$boy_name,
                                'boy_phone'=>$boy_phone,
                                'boy_city'=>$store->city,
                                'password'=>$password,
                                'boy_loc'=>$boy_loc,
                                'lat'=>$lat,
                                'lng'=>$lng,
                                'status'=>$status,
                                'store_id'=>$store->id,
                                'added_by'=>"store",
                            ]);
        
        if($insert){
            
            
           $admin=  DB::table('store_delivery_boy')
                            ->insertGetId([
                                'ad_dboy_id'=>$insert,
                                'boy_name'=>$boy_name,
                                'boy_phone'=>$boy_phone,
                                'boy_city'=>$store->city,
                                'password'=>$password,
                                'boy_loc'=>$boy_loc,
                                'lat'=>$lat,
                                'lng'=>$lng,
                                'status'=>$status,
                                'store_id'=>$store->id
                            ]);
            return redirect()->back()->withSuccess(trans('keywords.Added Successfully'));
        }
        else{
            return redirect()->back()->withErrors(trans('keywords.Something Wents Wrong'));
        }
      
    }
    
    public function EditD_boy(Request $request)
    {
        
         $dboy_id = $request->id;
         $title = "Edit Delivery Boy";
        $email=Auth::guard('store')->user()->email;
         $store= DB::table('store')
                   ->where('email',$email)
                   ->first();
          $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();  
                    
        $d_boy=  DB::table('store_delivery_boy')
            ->where('dboy_id', $dboy_id)
            ->first();
              
         $map1 = DB::table('map_api')
             ->first();
         $map = $map1->map_api_key; 
         $mapset = DB::table('map_settings')
                ->first();
        $mapbox = DB::table('mapbox')
                ->first();
        return view('store.d_boy.edit',compact("d_boy","email","store","logo","title","map",'mapset','mapbox'));
    }

    public function UpdateD_boy(Request $request)
    {
        $email=Auth::guard('store')->user()->email;
         $store= DB::table('store')
                   ->where('email',$email)
                   ->first(); 
       $dboy_id = $request->id;
       $boy_name = $request->boy_name;
       $boy_phone =$request->boy_phone;
       $password = $request->password;
       $boy_loc = $request->boy_loc;
       $city =$request->city;
       $mapset= DB::table('map_settings')
                ->first();
         $addres = str_replace(" ", "+", $boy_loc);
        $address1 = str_replace("-", "+", $addres);
        
     $chkboyrphon = DB::table('delivery_boy')
                  ->where('boy_phone', $boy_phone)
                  ->where('dboy_id','!=',$dboy_id)
                 ->first(); 

        if($chkboyrphon){
             return redirect()->back()->withErrors(trans('keywords.This Phone Number Is Already Registered With Another Delivery Boy'));
        } 
        
         $mapapi = DB::table('map_api')
                 ->first();
                 
        $key = $mapapi->map_api_key;  
        if($mapset->mapbox == 0 && $mapset->google_map == 1){ 
        $response = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$address1."&key=".$key));
        
         $lat = $response->results[0]->geometry->location->lat;
         $lng = $response->results[0]->geometry->location->lng;
        }
        else{
           $lat = $request->lat;
            $lng = $request->lng; 
        }
        
         $this->validate(
            $request,
                [
                    
                    'boy_name' => 'required',
                    'boy_phone' => 'required',
                    'password' => 'required',
                    'boy_loc'=> 'required',
                    
                ],
                [
                    'boy_name.required' => 'Enter Boy Name.',
                    'boy_phone.required' => 'Choose Boy Phone.',
                    'password.required' => 'choose password',
                    'boy_loc.required' => 'enter boy location',
                ]
        );


        $updated = DB::table('store_delivery_boy')
                   ->where('dboy_id', $dboy_id)
                    ->update([
                        'boy_name'=>$boy_name,
                        'boy_phone'=>$boy_phone,
                        'boy_city'=>$store->city,
                        'password'=>$password,
                        'boy_loc'=>$boy_loc,
                        'lat'=>$lat,
                        'lng'=>$lng
                       
                    ]);

        if($updated){
             $updated = DB::table('delivery_boy')
                   ->where('store_dboy_id', $dboy_id)
                    ->update([
                        'boy_name'=>$boy_name,
                        'boy_phone'=>$boy_phone,
                        'boy_city'=>$store->city,
                        'password'=>$password,
                        'boy_loc'=>$boy_loc,
                        'lat'=>$lat,
                        'lng'=>$lng
                       
                    ]);
            return redirect()->back()->withSuccess(trans('keywords.Updated Successfully'));
        }
        else{
            return redirect()->back()->withErrors(trans('keywords.Something Wents Wrong'));
        }
       
       
       
       
    }
    
    
    
 public function DeleteD_boy(Request $request)
    {
        $dboy_id = $request->id;

    	$delete=DB::table('store_delivery_boy')
             ->where('dboy_id', $dboy_id)->delete();
        if($delete)
        {
            $delete=DB::table('delivery_boy')
             ->where('dboy_id', $dboy_id)->delete();
        return redirect()->back()->withSuccess(trans('keywords.Deleted Successfully'));
        }
        else
        {
           return redirect()->back()->withErrors(trans('keywords.Something Wents Wrong')); 
        }
    }
    
    
        public function boy_reports(Request $request)
    {
         $title = "Home";
         $email=Auth::guard('store')->user()->email;
         $store= DB::table('store')
                   ->where('email',$email)
                   ->first();
          $logo = DB::table('tbl_web_setting')
                ->where('set_id', '1')
                ->first();  
        $dboy = DB::table('delivery_boy')
                   ->where('store_id',$store->id)
                    ->get();
        
        $orddboy =DB::table('orders')
             ->leftJoin('delivery_boy','orders.dboy_id','=','delivery_boy.dboy_id')
             ->select('delivery_boy.boy_name','delivery_boy.boy_phone', DB::raw('Count(orders.cart_id) as count'))
             ->groupBy('delivery_boy.boy_name','delivery_boy.boy_phone')
             ->whereDate('orders.delivery_date', '>', Carbon::now()->subDays(30))
             ->where('orders.payment_method','!=', NULL)
             ->where('orders.order_status', 'Completed')
             ->orderBy('count', 'desc')
             ->get();
      
      $user= DB::table('users')
             ->join('orders','users.user_id','=','orders.user_id')
             ->select('users.user_id','users.user_phone','users.user_name', DB::raw('Count(orders.cart_id) as count'))
             ->groupBy('users.user_id','users.user_phone','users.user_name')
             ->where('orders.store_id', $store->id)
             ->whereMonth('orders.delivery_date', date('m'))
            ->whereYear('orders.delivery_date', date('Y'))
            ->where('orders.payment_method','!=', NULL)
             ->where('orders.order_status', 'Completed')
            ->orderBy('count', 'desc')
            ->get();
      
   $user2 =DB::table('users')
             ->join('orders','users.user_id','=','orders.user_id')
             ->select('users.user_id','users.user_phone','users.user_name', DB::raw('Count(orders.cart_id) as count'))
             ->groupBy('users.user_id','users.user_phone','users.user_name')
             ->where('orders.store_id', $store->id)
             ->whereMonth('orders.delivery_date', '=', Carbon::now()->subMonth()->month)
             ->where('orders.payment_method','!=', NULL)
             ->where('orders.order_status', 'Completed')
            ->orderBy('count', 'asc')
            ->get();
      
             
                        
    	return view('store.d_boy.reports', compact('title',"store", "logo",'dboy','orddboy','user','user2'));
    }

}