<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Session;
use Helper;
use Storage;

class CategoryController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('category-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $category = Category::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $category = Category::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','category  Show All Record');
        return view('admin.category.index', compact('category'));
    }


    public function create()
    {
        if (!Helper::authCheck('category-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','category Add New button clicked');
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        Category::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','category Record Saved');
        return redirect('admin/category');
    }


    public function show($id)
    {
        $category = Category::findOrFail($id);
        Helper::activityStore('Store','category Single Record showed');
        return view('admin.category.show', compact('category'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('category-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $category = Category::findOrFail($id);
        Helper::activityStore('Edit','category Edit button clicked');
        return view('admin.category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        $category = Category::findOrFail($id);
        $category->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','category Record Updated');
        return redirect('admin/category');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('category-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Category::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','category Delete button clicked');
        return redirect('admin/category');
    }
}
