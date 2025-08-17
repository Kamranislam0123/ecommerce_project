<?php

namespace App\Http\Controllers\Customer;

use Exception;
use Carbon\Carbon;
use App\Models\Area;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Thana;
use App\Models\Country;
use App\Models\Product;
use App\Models\District;
use App\Models\Inventory;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Str;
use App\Models\DeliveryTime;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $today = date("D");
        if($today == 'Sat'){
            $time = DeliveryTime::where('group_id',operator: 1)->get();
        }
        elseif($today == 'Sun'){
            $time = DeliveryTime::where('group_id',2)->get();
        }
        elseif($today == 'Mon'){
            $time = DeliveryTime::where('group_id',3)->get();
        }
        elseif($today == 'Tue'){
            $time = DeliveryTime::where('group_id',4)->get();
        }
        elseif($today == 'Wed'){
            $time = DeliveryTime::where('group_id',5)->get();
        }
        elseif($today == 'Thu'){
            $time = DeliveryTime::where('group_id',6)->get();
        }
        else{
            $time = DeliveryTime::where('group_id',7)->get();
        }
        $sum = 0;
        $price = 0;
        if (Auth::guard('customer')->check()) {
                $offer_product = Product::where('is_offer','1')->get()->pluck('id')->toArray();
                
                $data = DB::table('orders')
                        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                        ->where('orders.customer_id', Auth::guard('customer')->user()->id)
                        ->get();
                $total_offer_buy = $data->sum('quantity');
                $offer_limit = (int) Offer::first()->offer_limit_qty;
                $available_qty = $offer_limit - $total_offer_buy;  


            $area = Area::latest()->get();
            $thana = Thana::latest()->get();
            $product = Product::where('is_offer','>','0')->get();
            $sum = 0;
            $offer_product = Product::where('is_offer','1')->get()->pluck('id')->toArray();
            // dd($offer_product);
            
             $exist_order_tables = OrderDetails::join('orders', 'order_details.order_id', '=', 'orders.id')
                        ->where('orders.customer_id', Auth::guard('customer')->user()->id)
                        ->whereDate('order_details.created_at', Carbon::today())
                        ->get()
                        ->pluck('product_id')
                        ->toArray();
            
            // return \Cart::getContent();
            foreach (\Cart::getContent() as $value) {                                    
                
                if(in_array($value->id, $offer_product)){
                    
                    if(in_array($value->id,$exist_order_tables)){
                        $price = $value->price* $value->quantity;
                        $offer_price = '';
                        foreach (\Cart::getContent() as $item) {
                            if($item->id == $value->id){
                                $item['attributes']['sum'] = $price;
                            }
                           }
                           $sum += $price;
                        continue;
                    }
                    else{
                        // dd('nai');
                        if($value->quantity >1){
                            $discount_product =  Product::where('id',$value->id)->first();
                            $discount = $value->price/100*$discount_product->discount;
                            $discount_price = $discount_product->price - $discount;
                            foreach (\Cart::getContent() as $item) {
                               if($item->id == $value->id){
                                   $item['attributes']['sum'] = $discount_price;
                                   $item['attributes']['offer_price'] = $discount_price;
                                   $item['attributes']['quantity'] = '1';
                               }
                              }
                            $exist_qty = $value->quantity - 1;
                            $second_price = $value->price * $exist_qty;
                            $price = $discount_price + $second_price;
                            $without_discount_price = $price -  $item['attributes']['offer_price'] = $discount_price;
                            $sum += $price;
                            foreach (\Cart::getContent() as $item) {
                                if($item->id == $value->id){
                                    $item['attributes']['sum'] += $second_price;
                                    $item['attributes']['exist_qty'] = $exist_qty;
                                    $item['attributes']['price'] = $price-$second_price;
                                }
                               }
                            continue;
                            
                        }else{

                            $discount_product = Product::where('id',$value->id)->first();
                            $discount = $value->price/100*$discount_product->discount;
                            $price = $discount_product->price - $discount;
                            
                            foreach (\Cart::getContent() as $item) {
                                if($item->id == $value->id){
                                    $item['attributes']['sum'] = $price;
                                    $item['attributes']['offer_price'] = $price;
                                    $item['attributes']['quantity'] = '1';
                                }
                               }
                               $sum += $price;
                            continue;                           
                        
                        }
                    }
                
                }


                $price = $value->quantity * $value->price;
                foreach (\Cart::getContent() as $item) {
                    if($item->id == $value->id){
                        $item['attributes']['sum'] = $price;
                    }
                   }
                   $sum += $price;
                continue;
                
            } 
            $district = District::all();
            return view('website.customer.checkout',compact('area','product','sum','price','thana','district','time'));
        } else {
            return redirect()->route('customer.login');
        }
    }

    public function orderStore(Request $request)
    {
        // Debug: Log function entry
        \Log::info('=== ORDER STORE FUNCTION STARTED ===');
        \Log::info('Request data:', $request->all());
        \Log::info('Cart content count: ' . \Cart::getContent()->count());
        
        // Validate cart is not empty
        if (\Cart::getContent()->count() == 0) {
            \Log::warning('Cart is empty - redirecting to cart list');
            Session::flash('faild', 'Your cart is empty. Please add products before placing an order.');
            return redirect()->route('cart.list');
        }

        // Debug: Log cart contents
        \Log::info('Cart contents:', \Cart::getContent()->toArray());

        // Validate required fields
        try {
            \Log::info('Starting validation...');
            $request->validate([
                'customer_name' => 'required|string|max:255',
                'customer_mobile' => 'required|string|max:20',
                'customer_email' => 'nullable|email',
                'district_id' => 'required|exists:districts,id',
                'area_id' => 'required|exists:areas,id',
                'thana_id' => 'required|exists:thanas,id',
                'billing_address' => 'required|string',
                'shipping_address' => 'required|string',
                'delivery_date' => 'required|string',
                'time_id' => 'required|exists:delivery_times,id',
                'total_amount' => 'required|numeric|min:0'
            ]);
            \Log::info('Validation passed successfully');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed:', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        }

        if (Auth::guard('customer')->check()){
            \Log::info('Customer authentication check passed');
            
            // Check if customer is verified and active
            $customer = Auth::guard('customer')->user();
            \Log::info('Customer details:', [
                'id' => $customer->id,
                'name' => $customer->name,
                'status' => $customer->status,
                'isVerified' => $customer->isVerified
            ]);
            
            if ($customer->status != 'a' || $customer->isVerified != '1') {
                \Log::warning('Customer not verified or inactive');
                Session::flash('faild', 'Your account must be verified and active to place orders.');
                return redirect()->route('customer.login');
            }
           
            $sum = 0;
            
            // Generate invoice number
            $last_invoice_no =  Order::whereDate('created_at', today())->latest()->take(1)->pluck('invoice_no');
            if(count($last_invoice_no) > 0){
                $invoice_no = $last_invoice_no[0] + 1;
            } else {
                $invoice_no = date('ymd') .'000001';
            }
            \Log::info('Generated invoice number: ' . $invoice_no);
            
            // Get area details
            $area = Area::where('id',$request->area_id)->first();
            if (!$area) {
                \Log::error('Area not found for ID: ' . $request->area_id);
                Session::flash('faild', 'Selected area not found. Please try again.');
                return back();
            }
            $area_amount = $area->amount;
            \Log::info('Area details:', [
                'area_id' => $request->area_id,
                'area_name' => $area->name,
                'area_amount' => $area_amount
            ]);

            
            try {
                \Log::info('Starting database transaction...');
                DB::beginTransaction();
                
                // Create order
                $order = new Order();
                $order->invoice_no = $invoice_no;
                $order->customer_id = Auth::guard('customer')->user()->id;
                $order->customer_name = $request->customer_name;
                $order->customer_mobile = $request->customer_mobile;
                $order->customer_email = $request->customer_email;
                $order->area_id = $request->area_id;
                $order->shipping_address = $request->shipping_address;
                $order->billing_address = $request->billing_address;
                $order->shipping_cost = $area_amount;
                $order->total_amount = $request->total_amount + $area_amount;
                $order->order_note = $request->order_note;
                $order->delivery_date = $request->delivery_date;
                $order->thana_id = $request->thana_id;
                $order->time_id = $request->time_id;
                $order->ip_address = $request->ip();
                $order->updated_by = Auth::guard('customer')->user()->id;
                
                \Log::info('Order data before save:', $order->toArray());
                
                $order->save();
                \Log::info('Order saved successfully with ID: ' . $order->id);

                $offer_product = Product::where('is_offer','1')->get()->pluck('id')->toArray();
                \Log::info('Offer products:', $offer_product);
                
                $exist_order_tables = OrderDetails::join('orders', 'order_details.order_id', '=', 'orders.id')
                        ->where('orders.customer_id', Auth::guard('customer')->user()->id)
                        ->whereDate('order_details.created_at', Carbon::today())
                        ->get()
                        ->pluck('product_id')
                        ->toArray();
                \Log::info('Existing order products for today:', $exist_order_tables);

                \Log::info('Starting to process cart items...');
                foreach (\Cart::getContent() as $value) {
                    \Log::info('Processing cart item:', [
                        'product_id' => $value->id,
                        'product_name' => $value->name,
                        'quantity' => $value->quantity,
                        'price' => $value->price,
                        'is_offer_product' => in_array($value->id, $offer_product)
                    ]);
                
                    if(in_array($value->id, $offer_product)){
                        
                        if(in_array($value->id, $exist_order_tables)){
                            \Log::info('Product already ordered today - applying regular price');
                            $price = $value->price* $value->quantity;
                            $orderDetails = new OrderDetails();
                            $orderDetails->order_id = $order->id;
                            $orderDetails->product_id = $value->id;
                            $orderDetails->product_name = $value->name;
                            $orderDetails->price =$value->price;
                            $orderDetails->quantity = $value->quantity;
                            $orderDetails->total_price = $price;
                            \Log::info('Saving order detail for existing offer product');
                            $orderDetails->save();
                            $sum += $price;

                            $inventory = Inventory::where('product_id',$value->id)->first();
                            if ($inventory) {
                                \Log::info('Inventory found for product ' . $value->id . ': ' . $inventory->purchage . ' available');
                                if ($inventory->purchage < $value->quantity) {
                                    \Log::error('Insufficient stock for product: ' . $value->name . ' (needed: ' . $value->quantity . ', available: ' . $inventory->purchage . ')');
                                    DB::rollBack();
                                    Session::flash('faild', 'Insufficient stock for product: ' . $value->name);
                                    return back();
                                }
                                $inventory->purchage = $inventory->purchage - $value->quantity;
                                $inventory->sales = $inventory->sales + $value->quantity;
                                $inventory->save();
                                \Log::info('Inventory updated for product ' . $value->id);
                            } else {
                                \Log::warning('No inventory found for product ' . $value->id);
                            }
                            continue;
                        }
                        else{
                            \Log::info('Product not ordered today - checking quantity for discount');
                            if($value->quantity > 1){
                                
                                $discount_product = Product::where('id',$value->id)->first();
                                \Log::info('Discount product details:', [
                                    'product_id' => $discount_product->id,
                                    'original_price' => $discount_product->price,
                                    'discount_percentage' => $discount_product->discount
                                ]);
                                
                                $discount = $value->price/100*$discount_product->discount;
                                $discount_price = $discount_product->price - $discount;
                                $exist_qty = $value->quantity - 1;
                                $second_price = $value->price * $exist_qty;
                                $price = $discount_price + $second_price;
                                
                                \Log::info('Price calculation for quantity > 1:', [
                                    'discount_amount' => $discount,
                                    'discount_price' => $discount_price,
                                    'exist_qty' => $exist_qty,
                                    'second_price' => $second_price,
                                    'final_price' => $price
                                ]);
                                $orderDetails = new OrderDetails();
                                $orderDetails->order_id = $order->id;
                                $orderDetails->product_id = $value->id;
                                $orderDetails->product_name = $value->name;
                                $orderDetails->price =$value->price;
                                $orderDetails->offer_price =$value->attributes->offer_price;
                                $orderDetails->offer_quantity = $value->attributes->quantity;
                                $orderDetails->quantity = $value->quantity;
                                $orderDetails->total_price = $price ;
                                \Log::info('Saving order detail for offer product (quantity > 1)');
                                $orderDetails->save();
                                $inventory = Inventory::where('product_id',$value->id)->first();
                                if ($inventory) {
                                    \Log::info('Inventory check for offer product (quantity > 1): ' . $inventory->purchage . ' available');
                                    if ($inventory->purchage < $value->quantity) {
                                        \Log::error('Insufficient stock for offer product (quantity > 1): ' . $value->name);
                                        DB::rollBack();
                                        Session::flash('faild', 'Insufficient stock for product: ' . $value->name);
                                        return back();
                                    }
                                    $inventory->purchage = $inventory->purchage - $value->quantity;
                                    $inventory->sales = $inventory->sales + $value->quantity;
                                    $inventory->save();
                                    \Log::info('Inventory updated for offer product (quantity > 1)');
                                } else {
                                    \Log::warning('No inventory found for offer product (quantity > 1): ' . $value->id);
                                }
                                $sum += $price;
                                continue;
                                //  dd('offer 1 er beshi');
                                
                            
                            }else{
                                \Log::info('Processing offer product with quantity = 1');
                              
                                $discount_product = Product::where('id',$value->id)->first();
                                $discount = $value->price/100*$discount_product->discount;
                                $price = $discount_product->price - $discount;
                                
                                \Log::info('Price calculation for quantity = 1:', [
                                    'discount_amount' => $discount,
                                    'final_price' => $price
                                ]);
                                $orderDetails = new OrderDetails();
                                $orderDetails->order_id = $order->id;
                                $orderDetails->product_id = $value->id;
                                $orderDetails->product_name = $value->name;
                                $orderDetails->offer_price =$value->attributes->offer_price;
                                $orderDetails->price =$value->price;
                                $orderDetails->quantity = $value->quantity;
                                $orderDetails->offer_quantity = $value->attributes->quantity;
                                $orderDetails->total_price = $price;
                                \Log::info('Saving order detail for offer product (quantity = 1)');
                                $orderDetails->save();
                                $sum += $price;
                                $inventory = Inventory::where('product_id',$value->id)->first();
                                if ($inventory) {
                                    \Log::info('Inventory check for offer product (quantity = 1): ' . $inventory->purchage . ' available');
                                    if ($inventory->purchage < $value->quantity) {
                                        \Log::error('Insufficient stock for offer product (quantity = 1): ' . $value->name);
                                        DB::rollBack();
                                        Session::flash('faild', 'Insufficient stock for product: ' . $value->name);
                                        return back();
                                    }
                                    $inventory->purchage = $inventory->purchage - $value->quantity;
                                    $inventory->sales = $inventory->sales + $value->quantity;
                                    $inventory->save();
                                    \Log::info('Inventory updated for offer product (quantity = 1)');
                                } else {
                                    \Log::warning('No inventory found for offer product (quantity = 1): ' . $value->id);
                                }

                                continue;
                            
                            }
                        }
                    
                    }
                    

                    \Log::info('Processing regular (non-offer) product');
                    $orderDetails = new OrderDetails();
                    $orderDetails->order_id = $order->id;
                    $orderDetails->product_id = $value->id;
                    $orderDetails->product_name = $value->name;
                    $orderDetails->price =$value->price;
                    $orderDetails->quantity = $value->quantity;
                    $price = $value->quantity * $value->price;
                    $orderDetails->total_price = $price;
                    \Log::info('Saving order detail for regular product');
                    $orderDetails->save();
                    $sum += $price;
                    $inventory = Inventory::where('product_id',$value->id)->first();
                    if ($inventory) {
                        \Log::info('Inventory check for regular product: ' . $inventory->purchage . ' available');
                        if ($inventory->purchage < $value->quantity) {
                            \Log::error('Insufficient stock for regular product: ' . $value->name);
                            DB::rollBack();
                            Session::flash('faild', 'Insufficient stock for product: ' . $value->name);
                            return back();
                        }
                        $inventory->purchage = $inventory->purchage - $value->quantity;
                        $inventory->sales = $inventory->sales + $value->quantity;
                        $inventory->save();
                        \Log::info('Inventory updated for regular product');
                    } else {
                        \Log::warning('No inventory found for regular product: ' . $value->id);
                    }
                    continue;
                    
                    
                }
                \Log::info('All cart items processed successfully. Total sum: ' . $sum);
                
                $company = CompanyProfile::first();
                $admin_phone = $company->phone_3;
                $admin_phone_2 = $company->phone_4;
                $admin_phone_3 = $company->phone_5;
                $customer_phone = Auth::guard('customer')->user()->phone;
                $name = Auth::guard('customer')->user()->name;
                $customer_id = Auth::guard('customer')->user()->code;
                $msg = " Order submit  $name . Invoice No. $order->invoice_no";
                $message = "$name .Your order submited successfully. Invoice No. $order->invoice_no";
                
                \Log::info('Sending SMS to customer: ' . $customer_phone);
                // $this->send_sms($admin_phone , $msg);
                // $this->send_sms($admin_phone_2 , $msg);
                // $this->send_sms($admin_phone_3 , $msg);
                $this->send_sms($customer_phone , $message);
                    
                \Log::info('Committing database transaction...');
                DB::commit();
                \Log::info('Database transaction committed successfully');
                
                Session::flash('message', 'Order submitted successfully! Invoice No: ' . $invoice_no);
                \Cart::clear();
                \Log::info('Cart cleared successfully');

                \Log::info('=== ORDER STORE FUNCTION COMPLETED SUCCESSFULLY ===');
                return redirect()->route('customer.panel');

            } 
            catch (Exception $e) {
                \Log::error('=== ORDER STORE FUNCTION FAILED ===');
                \Log::error('Exception message: ' . $e->getMessage());
                \Log::error('Exception file: ' . $e->getFile() . ':' . $e->getLine());
                \Log::error('Stack trace: ' . $e->getTraceAsString());
                \Log::error('Request data: ' . json_encode($request->all()));
                
                DB::rollBack();
                \Log::info('Database transaction rolled back');
                
                Session::flash('faild', 'Order submission failed. Please try again or contact support.');
                return back()->withInput();
            }

        }
        else{
            \Log::warning('Customer not authenticated - redirecting to login');
            return redirect()->route('customer.login');
        }

    }
}
