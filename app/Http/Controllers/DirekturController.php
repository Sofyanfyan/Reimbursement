<?php

namespace App\Http\Controllers;

use App\Models\Reimbursements;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DirekturController extends Controller
{
   
   public function index()
   {

      
      session()->flash('pages', 'create');
      return view('pages.formcreate');
   }

   public function createUser(Request $request)
   {

      try {
         //code...

         $credential = $request->except(['_token']);

         $last_nip = '0001';

         $check = DB::table('users')->latest('id')->first()->nip;

         $last_nip = $check ? $last_nip = (int)$check+1 : '';

         $credential['nip'] = (string)$last_nip;
         
      $validator = Validator::make($credential, [
         'nip' => 'required|unique:users|string|max:4',
         'nama' => 'required',
         'password' => 'required|min:6',
         'jabatan' => 'required'
      ]);

      if($validator->fails())
      {
         session()->flash('error',  $validator->errors());
         return redirect('/dasboard-direktur');
      }

      User::create([
         'nip' => (string)$last_nip,
         'nama' => $request->nama,
         'jabatan' => $request->jabatan,
         'password' => Hash::make($request->password),
      ]);

      return redirect('dasboard-direktur/users');

      } catch (Exception $err) {
         return dd($err);
      }
   }

   public function getUser()
   {
      try {
         //code...

         $data = User::orderBy('id', 'desc')->get();
         session()->flash('pages', 'alluser');

         // return response()->json($data);
         return view('pages.listuser')->with('data', $data);
         
      } catch (Exception $err) {
         return dd($err);
      }
   }

   public function destroy($id)
   {
      try {
         //code...

         
         $check = DB::table('users')->where('id', $id)->first();

         if(!$check)
         {
            session()->flash('error', "Internal server error!!!");
            return redirect('dasboard-direktur/users');
         }

         User::where('id', $id)->delete();

         $data = User::orderBy('id', 'desc')->get();

         return view('pages.listuser')->with('data', $data);

      } catch (Exception $err) {
         
         session()->flash('error', 'Internal server error!!!');

         return redirect('dasboard-direktur/users');
      }
   }


   public function update($nip)
   {
      
      try {
         
         
         if(!$nip)
         {
            session('error', 'Internal server error!!!');
            return redirect('dasboard-direktur/users?error=input');
         }
         session()->flash('pages', 'alluser');
         
         
         $data = DB::table('users')->where('nip', $nip)->first();

         if(!$data)
         {
            session()->flash('error',  'Internal server error!!!');
            return redirect('dasboard-direktur/users?error=NIP_NOT_FOUND_' . $nip);
         }

         $select = ['DIREKTUR', 'STAFF', 'FINANCE'];

         foreach($select as $key=>$el) {
            
            if($el === $data->jabatan)
            {
               unset($select[$key]);
            }
         }

         $res = (object) ['data' => $data, 'select' => $select];

         // return response()->json($data);
         return view('pages.formupdate')->with('res', $res);

      } catch (Exception $err) {
         

         return dd($err);
      }
   }


   public function updateUser(Request $request, $nip)
   {
      DB::beginTransaction();
      try {

         $user = Auth::user();

         $credential = $request->except(['_method', '_token']);

         $validator = Validator::make($credential, [
            'nama' => 'required',
            'jabatan' => 'required'
         ]);
   
         if($validator->fails())
         {
            DB::rollBack();
            session()->flash('error',  $validator->errors());
            return redirect('/dasboard-direktur/users?=Validator');
         }
         
         session()->flash('pages', 'alluser');
         

         $check = User::where('nip', $nip)->first();

         if(!$check)
         {
            DB::rollBack();
            session()->flash('error',  'Internal server error');
            return redirect('/dasboard-direktur/users?=notfound');
         }

         User::where('nip', $check->nip)->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
         ]);

         DB::commit();

         return redirect('/dasboard-direktur/users');

      } catch (Exception $err) {
         
         DB::rollBack();
         return dd($err);
      }
   }


   public function list()
   {
      try {
         //code...

         $data = Reimbursements::orderBy('id', 'desc')->get();
         session()->flash('pages', 'list');
         return view('pages.listrem')->with('data', $data);
      } catch (Exception $err) {

         session('error', 'Internal server error!!!');
         return redirect('/');
      }
   }


   public function detail($id)
   {
      try {
         //code...

         $data = Reimbursements::where('id', $id)->first();

         if(!$data){
            session()->flash('error', 'Id not found!!!');
            return redirect('/dasboard-finance');
         }

         // return redirect('/dasboard-finance')->with('data', $data);
         return view('pages.detailrem')->with('data', $data);

      } catch (Exception $err) {
         

         return dd($err);
      }
   }

   public function updateRem($id, $status)
   {
      try {
         //code...


         $data = Reimbursements::where('id', $id)->first();

         if(!$data)
         {
            session()->flash('error', 'Id not found!!!');
            // return redirect('/dasboard-finance/' . $id);
            return 'error';
         }

         Reimbursements::where('id', $id)->update([
            'status' => $status,
         ]);

         return redirect('/dasboard-direktur/list');

      } catch (Exception $err) {
         

         return dd($err);
      }
   }
}