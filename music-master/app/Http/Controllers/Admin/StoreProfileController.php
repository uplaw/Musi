<?php

namespace App\Http\Controllers\Admin;

use Helper;
use Session;
use Storage;
use App\User;
use App\StoreProfile;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StoreProfileController extends Controller
{

     public function index(Request $request)
    {
        if (!Helper::authCheck('storeprofile-show')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $storeprofile = StoreProfile::where('map_location', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('short_description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('schedules', 'LIKE', "%$keyword%")
                ->orWhere('offline_payment_methods_accepted', 'LIKE', "%$keyword%")
                ->orWhere('delivery_zone', 'LIKE', "%$keyword%")
                ->orWhere('delivery_fees', 'LIKE', "%$keyword%")
                ->orWhere('social_profiles', 'LIKE', "%$keyword%")
                ->orWhere('currency', 'LIKE', "%$keyword%")
                ->orWhere('whasapp_number', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $storeprofile = StoreProfile::latest()->paginate($perPage);
        }
        Helper::activityStore('Show','storeprofile  Show All Record');
        return view('admin.store-profile.index', compact('storeprofile'));
    }


    public function create()
    {
        if (!Helper::authCheck('storeprofile-create')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        Helper::activityStore('Create','storeprofile Add New button clicked');
        return view('admin.store-profile.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
			'map_location' => 'required',
			'name' => 'required',
			'short_description' => 'required',
			'schedules' => 'required',
			// 'offline_payment_methods_accepted' => 'required',
			'delivery_zone' => 'required',
			'delivery_fees' => 'required',
			'currency' => 'required',
            'whasapp_number' => 'required',
            'email' => 'required',
			'password' => 'required'
		]);
        $requestData = $request->all();
        $permission = DB::table('roles')->where('name', 'store')->first()->permission;
        // dd($permission);
        $user = User::create([
            'email' => $requestData['email'],
            'role' => 'store',
            'permission' => $permission,
            'password' => Hash::make($requestData['password']),
        ]);
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
        }
        if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
            if($request->oldlogo){
                Storage::delete($request->oldlogo);
            }
        }
        $requestData['user_id'] = $user->id;
        StoreProfile::create($requestData);
        Session::flash('success','Successfully Saved!');
        Helper::activityStore('Store','storeprofile Record Saved');
        return redirect('admin/store-profile');
    }


    public function show($id)
    {
        $storeprofile = StoreProfile::findOrFail($id);
        Helper::activityStore('Store','storeprofile Single Record showed');
        return view('admin.store-profile.show', compact('storeprofile'));
    }

    public function edit($id)
    {
        if (!Helper::authCheck('storeprofile-edit')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        $storeprofile = StoreProfile::findOrFail($id);
        Helper::activityStore('Edit','storeprofile Edit button clicked');
        return view('admin.store-profile.edit', compact('storeprofile'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'map_location' => 'required',
			'name' => 'required',
			'short_description' => 'required',
			'schedules' => 'required',
			// 'offline_payment_methods_accepted' => 'required',
			'delivery_zone' => 'required',
			'delivery_fees' => 'required',
			'currency' => 'required',
			'whasapp_number' => 'required',
			'email' => 'required',
			// 'password' => 'required',
        ]);
        
        $requestData = $request->all();
        
        if ($request->hasFile('image')) {
            $requestData['image'] = $request->file('image')
                ->store('uploads', 'public');
            if($request->oldimage){
                Storage::delete($request->oldimage);
            }
        }
        if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
            if($request->oldlogo){
                Storage::delete($request->oldlogo);
            }
        }

        $storeprofile = StoreProfile::findOrFail($id);
        $storeprofile->update($requestData);
        $user = User::findOrFail($storeprofile->user_id);
        $requestData['email'] = $requestData['email'];
        $requestData['password'] = Hash::make($requestData['password']);
        $user->update($requestData);
        Session::flash('success','Successfully Updated!');
        Helper::activityStore('Update','storeprofile Record Updated');
        return redirect('admin/store-profile');
    }


    public function destroy($id)
    {
        if (!Helper::authCheck('storeprofile-delete')) { Session::flash('error','Permission Denied!'); return redirect()->back();}
        StoreProfile::destroy($id);
        Session::flash('success','Successfully Deleted!');
        Helper::activityStore('Delete','storeprofile Delete button clicked');
        return redirect('admin/store-profile');
    }
}