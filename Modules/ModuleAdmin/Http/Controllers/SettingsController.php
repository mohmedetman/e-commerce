<?php

namespace Modules\ModuleAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\ModuleAdmin\Entities\Setting;
use Illuminate\Contracts\Support\Renderable;

class SettingsController extends Controller
{
   public function edit_settings ($type)  {
      $type_shipping='';
  if($type=='outer_label')
  $type_shipping= Setting::where('key', 'outer_label')->first();
  if($type=='free_label')
  $type_shipping= Setting::where('key', 'free_label')->first();
   if($type=='local_label')
  $type_shipping= Setting::where('key', 'local_label')->first();
   
//    return $type_shipping ;
        return view('moduleadmin::settings.edit_settings',compact('type_shipping'));
   }
   public function post_edit_settings(Request $request)  {
      //return $request ;
     try {
         $shipping_method = Setting::find($request->setting_id);

         DB::beginTransaction();
         $shipping_method->update(['plain_value' => $request->plain_value]);
         
         $shipping_method->value = $request->value;
         //$shipping_method->key = $request->name;
         $shipping_method->save();

         DB::commit();
         return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
     } catch (\Exception $ex) {
         return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);
         DB::rollback();
     }

      
   }
}