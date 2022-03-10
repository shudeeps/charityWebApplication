<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great
*/

Route::get('/',[
        'uses'=>'ProductController@getIndex',
        'as'=>'product.index'
]);


Route::get('/add-to-cart/{id}',[
        'uses'=>'ProductController@getAddToCart',
        'as'=>'product.addToCart'
]);


Route::get('/reduce/{id}',[
        'uses'=>'ProductController@getReduceByOne',
        'as'=>'product.reduceByOne'
]);

Route::get('/remove/{id}',[
        'uses'=>'ProductController@getRemoveItem',
        'as'=>'product.remove'
]);


Route::get('/shopping-cart',[
        'uses'=>'ProductController@getCart',
        'as'=>'product.shoppingCart'
]);


Route::get('/checkout',[
        'uses'=>'ProductController@getCheckout',
        'as'=>'checkout',
       'middleware'=>'auth'
]);

Route::post('/checkout',[
        'uses'=>'ProductController@postCheckout',
        'as'=>'checkout',
        'middleware'=>'auth'
]);

Route::get('/member',[
        'uses'=>'UserController@getMemberProfile',
        'as'=>'member.Dashboard',
        'middleware'=>'auth'
]);

Route::group(['prefix'=>'user'],function(){


Route::group(['middleware'=>'guest'],function(){

        Route::get('/signup',[
                'uses'=>'UserController@getSignup',
                'as'=>'user.signup'            
        ]);
        
        
        Route::post('/signup',[
                'uses'=>'UserController@postSignup',
                'as'=>'user.signup'               
        ]);
        
        Route::get('/signin',[
                'uses'=>'UserController@getSignin',
                'as'=>'user.signin'             
        ]);
        
        
        Route::post('/signin',[
                'uses'=>'UserController@postSignin',
                'as'=>'user.signin'
        ]);

});

Route::group(['middleware'=>'auth'],function(){
        Route::get('/profile',[
                'uses'=>'UserController@getProfile',
                'as'=>'user.profile'
        ]);
        
        
        Route::get('/logout',[
                'uses'=>'UserController@getLogout',
                'as'=>'user.logout'
        ]);        
       
});     
        
        
});

Route::get('admin/logout',[
        'uses'=>'Auth\LoginController@getLogout',
        'as'=>'admin.logout'
]); 


Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('admin.login');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

Route::get('/admin', 'Auth\LoginController@adminHomePage');


// Route::view('/admin', 'admin.home');

Route::get('/home', 'ProductController@getIndex')->name('home');


