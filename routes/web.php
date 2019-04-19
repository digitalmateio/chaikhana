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
if (in_array( $locale,  ['en','ru','ka','hy','az']  )) 
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
 Route::get('/work', 'WorkDeveloperController@work');

// dump( 'router = '.$locale );
// statr group by locale ******************************************************************************
Route::get("/", function () use ($locale){
 	return redirect('/'.$locale);
});

Route::group(array('prefix' => $locale), function()
{
      Route::get('/', 'HomeController@index')->name('homepage');
      Route::post('/subscribe', 'SubscribeController@request')->name('subscribe');

      Route::get('/about', 'AboutController@index');
      Route::get('/vacancie/{id}', 'VacancieController@index');

      Route::get('/shop', 'ShopController@index');
      Route::get('/shop/{id}', 'ShopController@show');

      Route::get('/authors', 'AuthorsController@index');
      Route::get('/author/{id}', 'AuthorsController@show');
      Route::post('/authors', 'AuthorsController@loadDataAjax');

      Route::get('/agency', 'AgencyController@index');

      Route::get('/tags', 'TagsController@index');
      Route::get('/tag/{id}', 'TagsController@tag');
    
      Route::get('/story/{id}', 'StoryController@story')->name('story');
});


Route::get(config('laraadmin.adminRoute') . '/blocks/{id}', '\App\Http\Controllers\LA\BlocksController@showStoryblocks')->name('blockShow');

Route::get(config('laraadmin.adminRoute') . '/block/edit/{story_id}/{block_id}', '\App\Http\Controllers\LA\BlocksController@editing')->name('blockEditing');

Route::post(config('laraadmin.adminRoute') . '/block/save/{id}', '\App\Http\Controllers\LA\BlocksController@editing')->name('blockSave');

//Route::post('/language','LanguageController@change')->name('changeLanguage');


/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
