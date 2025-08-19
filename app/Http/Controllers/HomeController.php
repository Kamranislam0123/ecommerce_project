<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Area;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Models\CompanyProfile;
use App\Models\DeliveryTime;
use App\Models\Management;
use App\Models\Partner;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\Team;
use App\Models\Thana;
use Illuminate\Http\Request;
use PharIo\Manifest\Manifest;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::latest()->get();
        $category = Category::with('SubCategory')->orderBy('rank_id', 'ASC')->get();
        $recent = Product::latest()->take(24)->get();

        $popular = Product::latest()->where('is_popular', '1')->limit(24)->get();
        $new_arrival = Product::where('is_arrival', '1')->get();
        $home = Product::where('category_id', '8')->inRandomOrder()->limit(12)->get();
        $fullAd = Ad::where('status', 'a')->where('position', '5')->inRandomOrder()->limit(1)->get();
        $partner = Partner::latest()->get();
        
        // Get categories with their products for dynamic sections
        $categorySections = Category::with(['product' => function($query) {
            $query->inRandomOrder()->limit(8);
        }])->whereHas('product')->take(3)->get();
        
        // $cartAll = Cart::getContent();

        return view('website.index', compact('banner', 'category',  'new_arrival', 'fullAd', 'popular', 'home', 'recent', 'categorySections'));
    }


    public function ProductDetails($slug)
    {
        // First try to find the product normally
        $product = Product::with(['category', 'inventory', 'productImage'])
            ->where('slug', $slug)
            ->first();
        
        // If not found, check if it's soft deleted
        if (!$product) {
            $product = Product::withTrashed()
                ->with(['category', 'inventory', 'productImage'])
                ->where('slug', $slug)
                ->first();
        }
        
        // Check if product exists
        if (!$product) {
            abort(404, 'Product not found');
        }
        
        // Check if product is soft deleted
        if ($product->trashed()) {
            abort(404, 'Product has been deleted');
        }
        
        // Get related products - improved logic
        $related = collect();
        
        // First, try to get products from the same subcategory
        if ($product->sub_category_id) {
            $subCategoryRelated = Product::with('inventory')
                ->where('sub_category_id', $product->sub_category_id)
                ->where('id', '!=', $product->id)
                ->where('status', 'A')
                ->inRandomOrder()
                ->limit(6)
                ->get();
            $related = $related->merge($subCategoryRelated);
        }
        
        // If we don't have enough related products, add products from the same category
        if ($related->count() < 6) {
            $categoryRelated = Product::with('inventory')
                ->where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->where('status', 'A')
                ->inRandomOrder()
                ->limit(6 - $related->count())
                ->get();
            $related = $related->merge($categoryRelated);
        }
        
        // If still not enough, add some popular products
        if ($related->count() < 6) {
            $popularRelated = Product::with('inventory')
                ->where('is_popular', 1)
                ->where('id', '!=', $product->id)
                ->where('status', 'A')
                ->inRandomOrder()
                ->limit(6 - $related->count())
                ->get();
            $related = $related->merge($popularRelated);
        }
        
        // Remove duplicates and limit to 6
        $related = $related->unique('id')->take(6);
        
        return view('website.productDetails', compact('product', 'related'));
    }


    // product details popup
    public function PopUpProduct($id)
    {
        $product = Product::with(['category', 'productImage'])->where('id', $id)->first();
        //  $product::with()->productImage['otherImage'] = asset($product->otherImage);
        $product['otherImage'] = $product->product_image;

        $product['image'] = asset('uploads/product/' . $product->image);
        return response()->json($product);
    }



    public function CategoryWise($slug)
    {
        $centerBigAds = Ad::where('status', 'a')->where('position', '4')->inRandomOrder()->limit(1)->get();
        $category_list = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $category_wise_product = $category_list->product()->inRandomOrder()->get();
        return view('website.category', compact('categories', 'category_wise_product', 'centerBigAds', 'category_list'));
    }
    public function singleSubCategory($slug)
    {
        $Categorylist = Category::where('slug', $slug)->first();

        return view('website.subcategory_list', compact('Categorylist'));
    }

    public function Products()
    {
        $category = Category::latest()->get();
        $product = Product::inRandomOrder()->paginate(5);
        $centerBigAds = Ad::where('status', 'a')->where('position', '4')->inRandomOrder()->limit(1)->get();
        $leftAds = Ad::where('status', 'a')->where('position', '1')->inRandomOrder()->limit(1)->get();
        return view('website.productsList', compact('product', 'category', 'centerBigAds', 'leftAds'));
    }


    public function SubCategoryWise($slug)
    {
        $subcategory = SubCategory::where('slug', $slug)->first();
        $categories = Category::all();
        $subcategory_wise_product = $subcategory->product()->inRandomOrder()->get();
        $centerBigAds = Ad::where('status', 'a')->where('position', '4')->inRandomOrder()->limit(1)->get();
        $leftAds = Ad::where('status', 'a')->where('position', '1')->inRandomOrder()->limit(1)->get();
        return view('website.subcategory', compact('subcategory', 'categories', 'subcategory_wise_product', 'centerBigAds', 'leftAds'));
    }

    public function newsEvent()
    {
        $news = Blog::latest()->get();
        return view('website.newsEvent', compact('news'));
    }

    public function newsDetails($slug)
    {
        $category = Category::inRandomOrder()->limit(5)->get();
        $newArrival = Product::inRandomOrder()->limit(5)->get();
        $news = Blog::where('slug', $slug)->first();
        return view('website.newsDetails', compact('news', 'category', 'newArrival'));
    }
    public function contact()
    {
        return view('website.contact');
    }


    public function aboutWebsite()
    {
        $service = Service::latest()->get();
        $management = Management::all();
        return view('website.about', compact('management', 'service'));
    }
    public function tramsCondition()
    {
        return view('website.trams_condition');
    }

    // search
    public function getSearchSuggestions($keyword)
    {
        // Limit keyword length for performance
        $keyword = substr($keyword, 0, 50);
        
        // Get product suggestions (only active products)
        $products = Product::select('name')
            ->where('status', 'A')
            ->where(function($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%")
                      ->orWhere('code', 'like', "%$keyword%");
            })
            ->limit(5)
            ->get()
            ->pluck('name')
            ->toArray();

        // Get category suggestions
        $categories = Category::select('name')
            ->where('name', 'like', "%$keyword%")
            ->limit(3)
            ->get()
            ->pluck('name')
            ->toArray();

        // Get subcategory suggestions
        $subcategories = SubCategory::select('name')
            ->where('name', 'like', "%$keyword%")
            ->limit(3)
            ->get()
            ->pluck('name')
            ->toArray();

        // Merge and remove duplicates
        $search_results = array_unique(array_merge($products, $categories, $subcategories));
        
        // Limit total results
        $search_results = array_slice($search_results, 0, 8);

        return response()->json($search_results);
    }

    public function productSearch()
    {
        if (request()->query('q')) {
            $keyword = request()->query('q');
            
            // Search in products by name, description, and short details
            $search_result = Product::where(function($query) use ($keyword) {
                $query->where('name', 'like', "%$keyword%")
                      ->orWhere('description', 'like', "%$keyword%")
                      ->orWhere('short_details', 'like', "%$keyword%")
                      ->orWhere('code', 'like', "%$keyword%");
            })
            ->where('status', 'A') // Only active products
            ->with(['category', 'inventory']) // Eager load relationships
            ->get();

            $categories = Category::all();
            $centerBigAds = Ad::where('status', 'a')->where('position', '4')->take(1)->get();
            $leftAds = Ad::where('status', 'a')->where('position', '1')->latest()->take(1)->get();

            return view('website.search', compact('search_result', 'keyword', 'leftAds', 'centerBigAds', 'categories'));
        }

        return redirect()->back();
    }

    public function allProduct()
    {
        $recent = Product::latest()->paginate(72);
        return view('website.allProduct', compact('recent'));
    }

    public function timeShow(Request $request)
    {
        $d_number = $request->day_pass;
        
        // Map day abbreviations to group IDs
        $dayMapping = [
            'Sat' => 1,
            'Sun' => 2,
            'Mon' => 3,
            'Tue' => 4,
            'Wed' => 5,
            'Thu' => 6,
            'Fri' => 7
        ];
        
        $group_id = $dayMapping[$d_number] ?? null;
        
        if (!$group_id) {
            return response()->json([], 400);
        }
        
        // Get active delivery times for the selected day, ordered by time
        $times = DeliveryTime::active()
            ->forDay($group_id)
            ->orderBy('time')
            ->get(['id', 'time']);
            
        return response()->json($times);
    }

public function thanaChange(Request $request)
{
    // Fetch Thana based on district_id
    $thanas = Thana::where('district_id', $request->district_id)->get();

    // Return as JSON response
    return response()->json($thanas);
}


    public function areaChange(Request $request)
    {
        $thana = Area::where('thana_id', $request->thana_id)->get();
        return response()->json($thana);
    }
}
