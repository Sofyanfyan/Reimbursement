<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reimbursements extends Model
{
    use HasFactory;


    
   protected $fillable = [
       'tanggal',
       'nama',
       'deskripsi',
       'file_pendukung',
       'status',
      ];
}