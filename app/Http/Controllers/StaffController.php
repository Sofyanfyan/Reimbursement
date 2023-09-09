<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reimbursements;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
   
   public function index()
   {
      try {

         return view('pages.formtask');
      } catch (Exception $err) {

         session('error', 'Internal server error!!!');
         return redirect('/');
      }
   }


   public function create(Request $request)
   {
      try {


         $credential = $request->only(['tanggal', 'nama', 'file_pendukung', 'deskripsi']);
         
         $validator = Validator::make($credential, [
            'tanggal' => 'required',
            'nama' => 'required|min:3',
            'file_pendukung' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
            'deskripsi' => 'required|min:20',
         ]);

         
         if($validator->fails())
         {
            session()->flash('error', ($validator->errors()));
            return redirect('/dasboard-staff');
         }
         
         $filename = $this->uploadImage($request, 'file_pendukung');
         
         $reimbursement = new Reimbursements;

         $reimbursement->nama = $request->nama;
         $reimbursement->tanggal = $request->tanggal;
         $reimbursement->deskripsi = $request->deskripsi;
         $reimbursement->status = 'pending';
         $reimbursement->file_pendukung = $filename;
         

         $reimbursement->save();
         return redirect('/dasboard-staff');
         // return $filename;
      } catch (exception $err) {
         
         return dd($err);
      }
   }
   
   private function uploadImage($request, $str)
   {
      $file= $request->file($str);

      $fileOriginalName = str_replace(' ', '_', $file->getClientOriginalName());

      $filename= date('YmdHi').$fileOriginalName;
      $file->move(public_path('/image'), $filename);

      $local = 'http://127.0.0.1:8000' . '/image/' . $filename;
      $production = env('APP_URL') . '/image/' . $filename;

      return env('APP_ENV') == 'local' ?  $local : $production;
   }

   
}