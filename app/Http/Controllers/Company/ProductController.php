<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware(['company', 'auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $my_products = User::find(auth()->user()->id)->with_trashed_products()->with('media')->simplePaginate(2);
        $count_of_my_products = User::find(auth()->user()->id)->with_trashed_products()->count();

        foreach ($my_products as $product) {
            $product->openModal = false;
        }

        return Inertia::render('Company/Product/Index', [
            'my_products' => $my_products,
            'css' => asset('css/custom.css'),
            'count_of_my_products' => $count_of_my_products,
        ]);

        // return view('company.product.index', [
        //     'my_products' => $my_products,
        //     'count_of_my_products' => $count_of_my_products,
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Category::all();
        return view('company.product.create', [
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyProductStoreRequest $request)
    {
        $product = Product::create([
            'name' => $request->name,
            "description" =>  $request->desc,
            "price" => $request->price,
            "quantity_unit" => $request->quantity,
            "category_id" => $request->category,
            "user_id" => auth()->user()->id,
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = md5(Str::uuid() . time()) . '.' . $file->getClientOriginalExtension();
            $product->addMediaFromRequest('image')->usingFileName($filename)->toMediaCollection();
        }

        return redirect()->back()->with('status', 'Product created!');
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
    public function edit(Product $product)
    {
        $this->authorize('update', $product);
        $categories = Category::all();
        return view('company.product.edit', [
            'product' => $product->load('media', 'category'),
            'categories' => $categories,
        ]);
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
        $product = Product::find($id);
        $this->authorize('update', $product);
        $product->update($request->all());
        if ($request->has('image')) {
            $file = $request->file('image');
            $filename = md5(Str::uuid() . time()) . '.' . $file->getClientOriginalExtension();

            foreach ($product->media as $media) {
                $media->delete();
            }
            $product->addMediaFromRequest('image')->usingFileName($filename)->toMediaCollection();
        }
        return redirect()->back()->with('status', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('products')) { {
                if (count($request->products) > 0) {
                    foreach ($request->products as $product) {
                        $product = Product::find($product);
                        $product->status = 'banned';
                        $product->save();
                        $product->delete();
                    }
                }
            }
            return redirect()->back()
                ->with('success', 'Products deleted successfully');
        }
    }
}
