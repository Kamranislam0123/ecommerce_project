<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;


class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('website.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
    //    dd($request->all());
            $total_item = \Cart::getContent()->count();
            if($total_item <100){
                \Cart::add([
                    'id' => $request->id,
                    'name' => $request->name,
                    'price' => '500',
                    'quantity' => 1,
                    'attributes' => array(
                        'image' => $request->image,
                        'slug' => $request->slug,
                    )
                ]);
            }
            
        
           
    }

    public function addToCartAjax(Request $request, $id)
    {
       $product = Product::where('id', $id)->first();
       
       if (!$product) {
           return response()->json(['error' => 'Product not found'], 404);
       }
       
       $total_item = \Cart::getContent()->count();
       if($total_item < 100){
        
        try {
            // Check if product already exists in cart
            $existingItem = \Cart::get($product->id);
            if ($existingItem) {
                // Update quantity if product already exists
                \Cart::update($product->id, [
                    'quantity' => [
                        'relative' => true,
                        'value' => 1
                    ]
                ]);
            } else {
                // Add new product to cart
                \Cart::add([
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => 1,
                    'attributes' => array(
                        'image' => $product->image,
                        'slug' => $product->slug,
                    )
                ]);
            }
            
            return response()->json(['success' => 'Cart added successfully']);
          
        } catch (\Throwable $th) {
            \Log::error('Cart add error: ' . $th->getMessage());
            return response()->json(['error' => 'Error adding to cart: ' . $th->getMessage()], 500);
        }
       } else {
           return response()->json(['error' => 'Cart limit reached (max 100 items)'], 400);
       }
    }

    public function addToCartAjaxUpdate(Request $request,$id)
    {
        foreach(\Cart::getContent() as $item) {
            $product = Product::with('inventory')->where('id', $id)->first();
            $stock = $product->inventory->purchage;
            $total_item = \Cart::getContent()->count();
            if($total_item <100){
                if($request->quantity > 100){
                    return response()->json(['error' => 'Maximum order quantity 100']);
                }
                else{
                    if($item->id == $id){
                        if($request->quantity<=$stock){
                          
                                 \Cart::update(
                                     $request->id,
                                     [
                                         'quantity' => [
                                             'relative' => false,
                                             'value' => $request->quantity
                                         ],
                                     ]
                                 );
                                 return response()->json(['success' => 'Cart successfully updated']);
                            
                        }
                        else{
                         return response()->json(['error' => 'Stock not available']);
                        }
                         
                     }
                }
            }
           
            
           
        }
        // dd($request->quantity);
        
        
    }
   
    public function buyToCart(Request $request)
    {
        $total_item = \Cart::getContent()->count();
            if($total_item <100){
                try {
                    \Cart::update(
                        $request->id,
                        [
                            'quantity' => [
                                'relative' => false,
                                'value' => $request->quantity
                            ],
                        ]
                    );
                    session()->flash('cart', 'Buy Now');
        
                    return redirect()->route('checkout.user');
                } catch (\Throwable $th) {
                    session()->flash('error', 'Faild to Buy');
        
                    return redirect()->back();
                }
            }
       
    }

    public function updateCart(Request $request)
    {
        $total_item = \Cart::getContent()->count();
            if($total_item <100){
                \Cart::update(
                    $request->id,
                    [
                        'quantity' => [
                            'relative' => false,
                            'value' => $request->quantity
                        ],
                    ]
                );
            }
       
        session()->flash('update', 'Cart is Updated Successfully !');

        return redirect()->back();
    }


    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('remove', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCartAjax( $id)
    {
        \Cart::remove($id);
        $remove = session()->flash('remove', 'Item Cart Remove Successfully !');

        return response()->json(['success' => 'Cart remove successfully']);
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
    public function cartAllData(){
        $cartAll = \Cart::getContent();
        return response()->json($cartAll);
    }
    public function cartContent(){
        $cart['total_amount'] = \Cart::getTotal();
        $cart['total_item'] = \Cart::getTotalQuantity();
        
        return response()->json($cart);
    }

    public function testCart()
    {
        try {
            // Test basic cart functionality
            $cart = \Cart::getContent();
            $total = \Cart::getTotal();
            $count = \Cart::getContent()->count();
            
            // Test adding a sample item
            \Cart::add([
                'id' => 'test-123',
                'name' => 'Test Product',
                'price' => 100,
                'quantity' => 1,
                'attributes' => array(
                    'image' => 'test.jpg',
                    'slug' => 'test-product',
                )
            ]);
            
            $newCount = \Cart::getContent()->count();
            
            return response()->json([
                'success' => true,
                'cart_count' => $count,
                'cart_total' => $total,
                'cart_items' => $cart->toArray(),
                'test_added' => $newCount > $count,
                'new_count' => $newCount
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString()
            ], 500);
        }
    }

   public function decrement($id){
        $product = Product::where('id',$id)->first();
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        foreach(\Cart::getContent() as $item){
            if($item->id == $product->id){
                if($item->quantity == 1){
                    // Don't decrement below 1
                    return response()->json(['error' => 'Quantity cannot be less than 1']);
                }
                else{
                    \Cart::update(
                        $item->id,
                        [
                            'quantity' => [
                                'relative' => false,
                                'value' => $item->quantity - 1
                            ],
                        ]
                    );
                    return response()->json(['success' => 'Quantity decreased successfully']);
                }
            } 
        }
       
        return response()->json(['error' => 'Item not found in cart'], 404);
    }
    
     public function increment($id){
        $product = Product::with('inventory')->where('id',$id)->first();
        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }
        
        $stock = $product->inventory->purchage;

        foreach(\Cart::getContent() as $item){
            if($item->id == $product->id){
                if($item->quantity + 1 > 100){
                    return response()->json(['error' => 'Maximum order quantity 100']);
                }
                else{
                    if($item->quantity + 1 <= $stock){
                        \Cart::update(
                            $item->id,
                            [
                                'quantity' => [
                                    'relative' => false,
                                    'value' => $item->quantity + 1
                                ],
                            ]
                        );
                        return response()->json(['success' => 'Quantity increased successfully']);
                    }
                    else{
                        return response()->json(['error' => 'Stock not available']);
                    }
                }
            }   
        }
        
        return response()->json(['error' => 'Item not found in cart'], 404);
    }
    
    
}
