<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OfferController extends Controller
{
    public function index(){
        $offers = Offer::latest()->get();
        return view('admin.offer.index', compact('offers'));
    }

    public function create(){
        return view('admin.offer.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'offer_type' => 'required|in:percentage,fixed,buy_one_get_one,free_shipping',
            'discount_value' => 'required|numeric|min:0',
            'minimum_order_amount' => 'nullable|numeric|min:0',
            'offer_limit_qty' => 'nullable|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'terms_conditions' => 'nullable'
        ]);

        $offer = new Offer();
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->offer_type = $request->offer_type;
        $offer->discount_value = $request->discount_value;
        $offer->minimum_order_amount = $request->minimum_order_amount ?? 0;
        $offer->offer_limit_qty = $request->offer_limit_qty ?? 0;
        $offer->start_date = $request->start_date;
        $offer->end_date = $request->end_date;
        $offer->is_active = $request->has('is_active');
        $offer->terms_conditions = $request->terms_conditions;

        if ($request->hasFile('image')) {
            $offer->image = $this->imageUpload($request, 'image', 'uploads/offers');
        }

        $offer->save();

        Session::flash('success', 'Offer created successfully');
        return redirect()->route('customer.offer');
    }

    public function edit($id){
        $offer = Offer::findOrFail($id);
        return view('admin.offer.edit', compact('offer'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'offer_type' => 'required|in:percentage,fixed,buy_one_get_one,free_shipping',
            'discount_value' => 'required|numeric|min:0',
            'minimum_order_amount' => 'nullable|numeric|min:0',
            'offer_limit_qty' => 'nullable|integer|min:0',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'is_active' => 'boolean',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'terms_conditions' => 'nullable'
        ]);

        $offer = Offer::findOrFail($id);
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->offer_type = $request->offer_type;
        $offer->discount_value = $request->discount_value;
        $offer->minimum_order_amount = $request->minimum_order_amount ?? 0;
        $offer->offer_limit_qty = $request->offer_limit_qty ?? 0;
        $offer->start_date = $request->start_date;
        $offer->end_date = $request->end_date;
        $offer->is_active = $request->has('is_active');
        $offer->terms_conditions = $request->terms_conditions;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($offer->image && file_exists($offer->image)) {
                unlink($offer->image);
            }
            $offer->image = $this->imageUpload($request, 'image', 'uploads/offers');
        }

        $offer->save();

        Session::flash('success', 'Offer updated successfully');
        return redirect()->route('customer.offer');
    }

    public function destroy($id){
        $offer = Offer::findOrFail($id);
        
        // Delete image if exists
        if ($offer->image && file_exists($offer->image)) {
            unlink($offer->image);
        }
        
        $offer->delete();
        
        Session::flash('success', 'Offer deleted successfully');
        return redirect()->route('customer.offer');
    }

    public function toggleStatus($id){
        $offer = Offer::findOrFail($id);
        $offer->is_active = !$offer->is_active;
        $offer->save();
        
        $status = $offer->is_active ? 'activated' : 'deactivated';
        Session::flash('success', "Offer {$status} successfully");
        return redirect()->route('customer.offer');
    }

    // Image upload helper method
    public function imageUpload($request, $name, $directory)
    {
        $doUpload = function ($image) use ($directory) {
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extention = $image->getClientOriginalExtension();
            $imageName = $name . '_' . uniqId() . '.' . $extention;
            $image->move($directory, $imageName);
            return $directory . '/' . $imageName;
        };

        if (!empty($name) && $request->hasFile($name)) {
            $file = $request->file($name);
            if (is_array($file) && count($file)) {
                $imagesPath = [];
                foreach ($file as $key => $image) {
                    $imagesPath[] = $doUpload($image);
                }
                return $imagesPath;
            } else {
                return $doUpload($file);
            }
        }
        return false;
    }
}
