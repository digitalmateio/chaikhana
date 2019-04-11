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

$locale = Request::segment(1);
// url ში არსებული უკვე ვალიდური ენი სკოდი გამოვიყნოთ ენის პარამეტრების
// დაყენებისთვის
if (in_array( $locale,  ['en','ru','ka','ny','az']  )) 
{
	if(\App::getLocale() != $locale)
	{
		\App::setLocale($locale);
	}
          
}elseif( \App::getLocale() == null ) {  
    $locale = \Config::get('app.locale');
    \App::setLocale($locale);
}else{
    $locale = \App::getLocale();
}

      Route::get('/test', 'HomeController@test');


// dump( 'router = '.$locale );
// statr group by locale ******************************************************************************
Route::get("/", function () use ($locale){
 	return redirect('/'.$locale);
});

Route::group(array('prefix' => $locale), function()
{
      Route::get('/', 'HomeController@index')->name('homepage');
      Route::post('/subscribe', 'SubscribeController@request')->name('subscribe');
});


Route::get(config('laraadmin.adminRoute') . '/section/edit/{id}', '\App\Http\Controllers\LA\BlocksController@editing')->name('blockEditing');
Route::post(config('laraadmin.adminRoute') . '/section/save/{id}', '\App\Http\Controllers\LA\BlocksController@editing')->name('blockSave');

Route::post('/language','LanguageController@change')->name('changeLanguage');


/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
