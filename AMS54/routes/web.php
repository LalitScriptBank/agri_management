 <?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


 
 /*Route::get('/', 'AdminController@indexx')->name('home');*/ 

Route::prefix('admin')->group(function () {
  
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
 
 

 Route::get('/', 'AdminController@index')->name('admin.home');
});




Route::prefix('seller')->group(function () {
Route::get('/', 'SellerController@index')->name('home');
Route::get('/login', 'Auth\SellerLoginController@showLoginForm')->name('seller.login');
Route::post('/login', 'Auth\SellerLoginController@login')->name('seller.login.submit');
});


 
 Route::resource('/post', 'PostController');
 Route::get('/post/{slug}','PostController@show');
  Route::get('/post/all', 'PostController@index');
 

 


Route::resource('/test', 'PostController');
 Route::get('/user',  function ()
 {
 	 return view('admin.user');
 })->middleware('auth:admin');

Route::resource('/product', 'ProductController')->middleware('auth:admin');



Route::get('cart', 'CartController@index');
Route::post('cart', 'CartController@store')->name('addtocart');
Route::get('mycart', 'CartController@mycart');











