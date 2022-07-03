<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $css = asset('css/custom-2.css');
        $products = Product::with('media')->withTrashed()->paginate(2);
        $products_count = Product::count();

        Inertia::setRootView('admin');

        return Inertia::render('Admin/Products', compact('products', 'css', 'products_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    public function activate(Request $request)
    {
        $product = Product::findOrFail(request('id'));
        $product->update([
            'status' => 'active'
        ]);
        return redirect()->back()->with('success', 'Product activated successfully');
    }

    public function deactivate(Request $request)
    {
        $product = Product::findOrFail(request('id'));
        $product->update([
            'status' => 'inactive'
        ]);
        return redirect()->back()->with('success', 'Product deactivated successfully');
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


                        if ($product) {
                            $product->status = 'banned';
                            $product->save();
                            $product->delete();
                        } else {
                            return redirect()->back()->with('error', array('Product not found'));
                        }
                    }
                }
            }
            return Redirect::route('admin.products.index')
                ->with('success', 'Products deleted successfully');
        }
    }

    public function unban(Request $request)
    {
        if($request->has('id')) {
            $product = Product::withTrashed()->findOrFail(request('id'));
            if($product) {
                if($product->trashed()) {
                    $product->restore();
                    $product->status = 'inactive';
                    $product->save();
                    return redirect()->back()->with('success', 'Product unbanned successfully');
                } else {
                    return redirect()->back()->with('error', array('Product is not banned'));
                }
            } else {
                return redirect()->back()->with('error', array('Product not found'));
            }
        }
        return redirect()->back()->with('success', 'Product unbanned successfully');
    }
}
