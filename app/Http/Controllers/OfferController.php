<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        // Get all active offers
        $offers = Offer::active()->latest()->get();
        
        // Get products with offers
        $offerProducts = Product::where('is_offer', 1)
                               ->with(['category', 'inventory'])
                               ->latest()
                               ->get();
        
        return view('website.offers', compact('offers', 'offerProducts'));
    }

    public function show($id)
    {
        $offer = Offer::findOrFail($id);
        
        // Get products related to this offer (if any)
        $products = Product::where('is_offer', 1)
                          ->with(['category', 'inventory'])
                          ->latest()
                          ->get();
        
        return view('website.offer-details', compact('offer', 'products'));
    }
}
