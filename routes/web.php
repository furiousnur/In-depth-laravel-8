<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('vue',function (){
   return view('vue-welcome');
});

Route::resource('api-url', \App\Http\Controllers\ApiController::class);

Route::post('api-url-store', [\App\Http\Controllers\ApiController::class, 'apiUrlStore']);
Route::get('api-url-get-all', [\App\Http\Controllers\ApiController::class, 'index']);

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

