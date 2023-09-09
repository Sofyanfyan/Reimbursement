<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

   public function login()
   {
      try {
         //code...

         if (Auth::check()) {


            $user = Auth::user();
            if($user->jabatan === 'DIREKTUR'){
               return redirect('/dasboard-direktur');
            } else if ($user->jabatan === 'FINANCE') {
               return redirect('/dasboard-finance');
            } else {
               return redirect('/dasboard-staff');
            }
         } else{
            return view('components.login');
         }

      } catch (Exception $err) {
         return dd($err);      
      }
   }
   public function postLogin(Request $request)
   {
      try {
         //code...

         $credential = $request->only(['nip', 'password']);

         $validator = Validator::make($credential, [
            'nip' => 'required|max:15',
            'password' => 'required',
         ]);

         if($validator->fails())
         {
            session()->flash('error', $validator->errors());
            return redirect('/');
         }

         $auth = Auth::attempt(['nip' => $request->nip, 'password' => $request->password]);

         if($auth)
         {
            // session()->flash('error', null);

            $user = Auth::user();

            if($user->jabatan === 'DIREKTUR'){
               return redirect('/dasboard-direktur');
            } else if ($user->jabatan === 'FINANCE') {
               return redirect('/dasboard-finance');
            } else {
               return redirect('/dasboard-staff');
            }
         }

         else {
            session()->flash('error', 'Invalid nip/password');
            return redirect('/');
         }

      } catch (Exception $err) {
         
         return response()->json($err, 500);
      }
   }


   public function logout() {
      Auth::logout();
      return redirect('/');
   }
}