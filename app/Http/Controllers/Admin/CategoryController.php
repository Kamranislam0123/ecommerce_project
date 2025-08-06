<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $category = Category::latest()->get();
        return view('admin.category.list', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:100', Rule::unique('categories')->whereNull('deleted_at')],
            'rank_id' => 'required|numeric',
            'image' => 'required|max:1000||Image|mimes:jpg,png,jpeg,bmp,webp',
            'ip_address' => 'max:15'
        ]);
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $fileName = rand(111, 99999) . '.' . $extension;
        $imageResize = Image::make($image->getRealPath());
        $imageResize->resize(100, 100);
        $imageResize->save(public_path('uploads/category/' . $fileName));
        $imageNameWithPath = 'uploads/category/' . $fileName;

        try {
            $slug = Str::slug($request->name . '-' . time());
            $category = new Category();
            $category->name = $request->name;
            $category->rank_id = $request->rank_id;
            $category->slug = $slug;
            $category->details = $request->details;
            $category->image = $imageNameWithPath;
            $category->save_by = Auth::user()->id;
            $category->ip_address = $request->ip();
            $category->save();

            if ($category) {
                Session::flash('success', 'category Added Successfully');
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            Session::flash('error', 'Opps! category Added Fail');
            // return redirect()->back();
            return $th->getMessage();
        }
        // dd($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
{
    try {
        // Validate the input data
        $request->validate([
            'name' => 'max:100',
            'rank_id' => 'required|numeric',
            'image' => 'image|mimes:jpg,png,jpeg,bmp',
            'ip_address' => 'max:15'
        ]);

        // Find the category by ID
        $category = Category::find($id);

        // Check for duplicate category name
        $duplicate = Category::where('id', '!=', $id)->where('name', $request->name)->get();

        // If duplicate found, flash message and return back
        if (count($duplicate) > 0) {
            Session::flash('duplicate', 'Duplicate Category');
            return back();
        } else {
            // Handle image upload if provided
            $categoryImage = '';
            if ($request->hasFile('image')) {
                // Delete the old image if it exists
                if (!empty($category->image) && file_exists($category->image)) {
                    unlink($category->image);
                }
                $categoryImage = $this->imageUpload($request, 'image', 'uploads/category');
            } else {
                $categoryImage = $category->image;
            }

            // Generate a unique slug
            $slug = Str::slug($request->name . '-' . time());
            $i = 0;
            while (true) {
                if (Category::where('slug', '=', $slug)->exists()) {
                    $i++;
                    $slug .= '_' . $i;
                    continue;
                }
                break;
            }

            // Update category details
            $category->name = $request->name;
            $category->rank_id = $request->rank_id;
            $category->slug = $slug;
            $category->details = $request->details;
            $category->updated_by = Auth::user()->user_id;
            $category->ip_address = $request->ip();
            $category->image = $categoryImage;
            $category->save();

            // Check if the category was updated successfully
            if ($category) {
                Session::flash('success', 'Category Updated Successfully');
                return redirect()->route('category.index');
            } else {
                Session::flash('error', 'Update Failed');
                return redirect()->back();
            }
        }

    } catch (\Throwable $th) {
        // Catch any exception or error and log it
        \Log::error('Error in Category update: ' . $th->getMessage());
        
        // Return a user-friendly error message
        Session::flash('error', 'An error occurred while updating the category');
        return redirect()->back();
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $product = Product::where('category_id', $category->id)->count();
        $sub = SubCategory::where('category_id', $category->id)->count();
        if ($product > 0 or $sub > 0) {
            Session::flash('delete_check', 'Delete First dependency subcategory or product');
            return back();
        } else {
            if (!empty($category->image) && file_exists($category->image)) {
                unlink($category->image);
            }
            $category->delete();
            if ($category) {
                Session::flash('delete', 'Category Delete Successfully');
                return redirect()->back();
            } else {
                Session::flash('error', 'Delete fail');
                return redirect()->back();
            }
        }
    }

    public function  rank()
    {
        $category = Category::orderBy('rank_id', 'ASC')->get();
        return view('admin.category.rank', compact('category'));
    }

    public function rankStore(Request $request)
    {

        $count = count($request->rank_id);
        for ($i = 0; $i < $count; $i++) {

            Category::where('id', $request->id[$i])->update(['rank_id' => $request->rank_id[$i]]);
        }
        return back();
    }
}
