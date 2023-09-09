<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $user = [
         
         [
            'nip' => '1234',
            'nama' => 'DONI',
            'jabatan' => 'DIREKTUR',
            'password' => Hash::make('123456')
         ],
         [
            'nip' => '1235',
            'nama' => 'DONO',
            'jabatan' => 'FINANCE',
            'password' => Hash::make('123456')
         ],
         [
            'nip' => '1236',
            'nama' => 'DONA',
            'jabatan' => 'STAFF',
            'password' => Hash::make('123456')
         ],

      ];


      foreach ($user as $value) {
            
         User::create($value);
      }
    }
}