<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexProduct()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $products=Product::with('photo')->latest()->paginate(10);
        return  response()->view('products',compact(['products','user']));

    }

    public function showProduct($slug)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $products=Product::with('photo')->latest()->paginate(10);
        $product=Product::with('photo')->whereSlug($slug)->first();
        return  response()->view('product_show',compact(['products','user','product']));

    }
    public function index()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $products=Product::with('photo')->latest()->paginate(10);
        return  response()->view('admin.products.index',compact(['products','user']));

    }

    public function create()
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        return view('admin.products.create',compact(['user']));
    }

    public function store(ProductRequest $request)
    {

        $product=new Product();
        $product->title=$request->title;
        $product->slug=$this->makeSlug($request->title);
        $product->body=$request->body;
        $product->price=$request->price;
        $product->photo_id=$request->photo_id;
        $product->save();
        alert()->success('محصول '.$product->title.' به موفقیت اضافه شد.','محصولات')->persistent("بستن");
        return  redirect()->route('products.index');

    }

    public function show(product $product)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $product=Product::with('photo')->findOrFail($product->id);
        return response()->view('admin.products.show',compact(['product','user']));
    }

    public function edit($id)
    {
        $user=User::with('photo')->findOrfail(auth()->user()->id);
        $product=Product::with('photo')->findOrFail($id);
        return response()->view('admin.products.edit',['product'=>$product,'user'=>$user]);
    }

    public function update(ProductRequest $request, $id)
    {

        $product=Product::findOrFail($id);
        $product->title=$request->title;
        $product->slug=$this->makeSlug($request->title);
        $product->body=$request->body;
        $product->price=$request->price;
        $product->photo_id=$request->photo_id;
        $product->save();

        alert()->success('محصولات '.$product->title.' با موفقیت بروز رسانی شد.','محصولات')->persistent("بستن");
        return  redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();
        alert()->error('محصولات '.$product->title.' با موفقیت حذف شد.','محصولات')->persistent("بستن");
        return  redirect()->route('products.index');
    }


    public function makeSlug($string)
    {
        //$string = strtolower($string);
        //$string = str_replace(['؟', '?'], '', $string);
        return preg_replace('/\s+/u', '-', trim($string));
    }
}
