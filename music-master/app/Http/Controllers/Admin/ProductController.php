<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Session;
use Storage;
use App\Product;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('product-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $product = Product::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('sale_price', 'LIKE', "%$keyword%")
                ->orWhere('stock', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('category_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','product  Show All Record');
        return view('admin.product.index', compact('product'));
    }


    public function create()
    {
        if (!Helper::authCheck('product-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','product Add New button clicked');
        return view('admin.product.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'description' => 'required',
			'price' => 'required',
			'sale_price' => 'required',
			'stock' => 'required',
			'status' => 'required',
			'category_id' => 'required'
		]);
        $requestData = $request->all(); 
        $requestData['store_profile_id'] = Auth::user()->store->id;
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
        }

        Product::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','product Record Saved');
        return redirect('admin/product');
    }


    public function show($id)
    {
        $product = Product::findOrFail($id);
        Helper::activityStore('Store','product Single Record showed');
        return view('admin.product.show', compact('product'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('product-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $product = Product::findOrFail($id);
        Helper::activityStore('Edit','product Edit button clicked');
        return view('admin.product.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'description' => 'required',
			'price' => 'required',
			'sale_price' => 'required',
			'stock' => 'required',
			'status' => 'required',
			'category_id' => 'required'
		]);
        $requestData = $request->all();
                if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
        }

        $product = Product::findOrFail($id);
        $product->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','product Record Updated');
        return redirect('admin/product');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('product-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Product::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','product Delete button clicked');
        return redirect('admin/product');
    }
}