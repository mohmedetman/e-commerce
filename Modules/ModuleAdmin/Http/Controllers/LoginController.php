<?php

namespace Modules\ModuleAdmin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use Modules\ModuleAdmin\Http\Requests\LoginRequest;

class LoginController extends Controller
{
   public function login() {
    return view('moduleadmin::auth.login');
   }
   public function post_login(LoginRequest $request){
      if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
         
          return redirect() -> route('admin.dashboard');
      }
    
      return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
   }
   public function logout(){
      Auth::guard('admin')->logout();
      return redirect('/admin/login');
   }
}