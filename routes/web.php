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

  

Route::group(['middleware'=>'admin'], function(){

  Route::resource('admin/users', 'AdminUsersController');

  Route::resource('admin/projects', 'AdminProjectsController');

  Route::resource('admin/categories', 'AdminCategoriesController');

  Route::delete('delimg/{id}', function($id){

    $img = App\Image::findOrFail($id);
     unlink($img->path);
    $img->delete();
 
    session()->flash('success','Image Deleted Successfully');
    return redirect()->back();
     
     });

  Route::get('admin', function(){

    if(Auth::user()->role){
      if( Auth::user()->role->name == 'Administrator'){
        return view('admin.dashboard');
      }
    }
    else{
      return view('welcome');
    }
  
  });

});
  Route::get('/', function () {
    return view('welcome');
  });

  Auth::routes();

  Route::get('/home', 'HomeController@index')->name('home');






  




