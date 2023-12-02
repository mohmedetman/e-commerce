<?php

namespace Modules\ModuleAdmin\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\ModuleAdmin\Entities\Setting;
use Illuminate\Contracts\Support\Renderable;
use Modules\ModuleAdmin\Http\Requests\ProfileRequest;

class ModuleAdminController extends Controller
{
    public  function index()
    {
        return view('moduleadmin::index');
    }
    public function edit_admin()
    {
        $admin = Admin::find(auth('admin')->user()->id);
        // return $admin ;
        return view('moduleadmin::edit_profile.edit_profile', compact('admin'));
    }
    public function edit_profile_admin(ProfileRequest $request)
    {
        // try {

            $admin = Admin::find(auth('admin')->user()->id);
            if ($request->filled('password')) {
                $request->merge(['password' => bcrypt($request->password)]);
            }

            unset($request['admin_id']);
            unset($request['password_confirmation']);

            $admin->update($request->all());

        //  unset($request->admin_id);
            $admin->update($request->all());

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
        // } catch (\Exception $ex) {
        //     return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);
        // }
    }
}