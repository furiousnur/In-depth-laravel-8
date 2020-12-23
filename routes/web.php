<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

/*Route::get('vue',function (){
   return view('vue-welcome');
});*/

//Route::view('/vue','vue-welcome');
Route::view('/', 'vue-welcome');
/*Route::get('/',function (){
//   $categories = \App\Models\Category::all();
    $categories = Cache::rememberForever('categories',function (){
        return Category::all();
    });
   return view('welcome',compact('categories'));
});*/
Route::resource('api-url', \App\Http\Controllers\ApiController::class);
Route::post('api-url-store', [\App\Http\Controllers\ApiController::class, 'apiUrlStore']);
Route::get('api-url-get-all', [\App\Http\Controllers\ApiController::class, 'index']);
Route::delete('api-url-delete/{id}', [\App\Http\Controllers\ApiController::class, 'destroy']);

Route::get('db-insert', function (){
   /*DB::table('users')->create([
     'name' => 'password',
     'email' => 'password@gmail.com',
//     'password' => \Illuminate\Support\Facades\Hash::make(12345678)
     'password' => 'password'
   ]);*/

   $data = [
       'name' => 'himel',
   ];
//   \App\Models\Category::destroy($data);
   Category::whereName('himel')->delete();
   dd(\App\Models\Category::all());
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/url', function(){
    $u = User::where('email', request()->user)->first();
    \Illuminate\Support\Facades\Auth::loginUsingId($u->id);
    return redirect('/');
});

