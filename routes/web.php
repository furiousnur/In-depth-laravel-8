<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('vue',function (){
   return view('vue-welcome');
});

Route::get('db-insert', function (){
/*   DB::table('users')->create([
     'name' => 'password',
     'email' => 'password@gmail.com',
//     'password' => \Illuminate\Support\Facades\Hash::make(12345678)
     'password' => 'password'
   ]);
   */
   $data = [
       'name' => 'password',
       'email' => 'password@gmail.com',
       'password' => 'password'
   ];

   \App\Models\User::create($data);

   dd(\App\Models\User::all());
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
