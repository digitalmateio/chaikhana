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
      // Home & Subscribe
      Route::get('/', 'HomeController@index')->name('homepage');
      Route::post('/subscribe', 'SubscribeController@request')->name('subscribe');

      // About
      Route::get('/about', 'AboutController@index');
      Route::get('/vacancie/{id}', 'VacancieController@index');

      // Shop
      Route::get('/shop', 'ShopController@index');
      Route::get('/shop/buy', 'ShopController@buy')->name('shopBuy');
      Route::get('/shop/{id}', 'ShopController@show');
      Route::post('/shop/price', 'ShopController@imagePrice')->name('getImagePrice');
   
      // Authors
      Route::get('/authors', 'AuthorsController@index');
      Route::get('/author/{id}', 'AuthorsController@show');
      Route::post('/authors', 'AuthorsController@loadDataAjax');
      Route::post('/searchauthors', 'AuthorsController@searchAtaAjax');

      // Agency
      Route::get('/agency', 'AgencyController@index');
      Route::post('/agencyType', 'AgencyController@DataAjax');
      Route::get('/agencyTypeFull/{id}', 'AgencyController@DataAjaxFullInfo');

      // Tags
      Route::get('/tags', 'TagsController@index');
      Route::get('/tag/{id}', 'TagsController@tag');
    
      // Editions
      Route::get('/editions', 'EditionsController@index');
      Route::get('/edition', function(){
        return abort(404);
      });
      Route::get('/edition/{id}', 'EditionsController@edition');
      Route::post('/edition', 'EditionsController@loadDataAjax');


      // Story
      Route::get('/story/{id}', 'StoryController@story')->name('story');
      Route::get('/story', 'StoryController@index')->name('story');
      Route::post('/story', 'StoryController@loadDataAjax');
      Route::get('/story/sort/{string}', 'StoryController@sort')->name('sort');
      Route::get('/story/type/{id}', 'StoryController@type')->name('type');

    
      Route::get('/login', '\App\Http\Controllers\LoginController@showLoginForm')->name('userLogin');
      Route::post('/login', '\App\Http\Controllers\LoginController@login')->name('userLogin');
      Route::get('/logout', '\App\Http\Controllers\LoginController@logout')->name('userLoout');
      Route::get('/registration', '\App\Http\Controllers\RegisterController@showRegistrationForm')->name('userRegistr');
      Route::post('/registration', '\App\Http\Controllers\RegisterController@register')->name('userRegistration');

      Route::get('account', function(){
          dd('account');
      })->name('account');

    
});

Route::get("/story", function () use ($locale){
  return view('story');
});


//BLOCKS
Route::get(config('laraadmin.adminRoute') . '/blocks/{id}', '\App\Http\Controllers\LA\BlocksController@showStoryblocks')->name('blockShow');

Route::get(config('laraadmin.adminRoute') . '/block/edit/{story_id}/{block_id}', '\App\Http\Controllers\LA\BlocksController@editing')->name('blockEditing');

Route::post(config('laraadmin.adminRoute') . '/block/save/{id}', '\App\Http\Controllers\LA\BlocksController@editing')->name('blockSave');

// EVENTS
Route::get(config('laraadmin.adminRoute') . '/events/block/edit/{event_id}/{block_id}', '\App\Http\Controllers\LA\EventsController@editing')->name('eventeditblock');

Route::get(config('laraadmin.adminRoute') . '/events/blocks/{event_id}', 'LA\EventsController@showEventBlocks')->name('showEventBlocks');




//Route::post('/language','LanguageController@change')->name('changeLanguage');


/* ================== Homepage + Admin Routes ================== */

require __DIR__.'/admin_routes.php';
