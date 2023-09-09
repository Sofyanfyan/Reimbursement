<?php

namespace App\Http\Controllers;

use App\Models\Reimbursements;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{


   public function index()
   {
      try {
         //code...

         $data = Reimbursements::orderBy('id', 'desc')->get();

         return view('pages.listtask')->with('data', $data);
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
         return view('pages.detail')->with('data', $data);

      } catch (Exception $err) {
         

         return dd($err);
      }
   }

   public function update($id, $status)
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

         return redirect('/dasboard-finance');

      } catch (Exception $err) {
         

         return dd($err);
      }
   }
}