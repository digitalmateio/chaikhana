<?php

/* ================== Homepage ================== */
// Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::auth();

/* ================== Access Uploaded Files ================== */
Route::get('files/{hash}/{name}', 'LA\UploadsController@get_file');

/*
|--------------------------------------------------------------------------
| Admin Application Routes
|--------------------------------------------------------------------------
*/

$as = "";
if(\Dwij\Laraadmin\Helpers\LAHelper::laravel_ver() >= 5.3) {
	$as = config('laraadmin.adminRoute').'.';
	
	// Routes for Laravel 5.3
	Route::get('/logout', 'Auth\LoginController@logout');
}

Route::group(['as' => $as, 'middleware' => ['auth', 'permission:ADMIN_PANEL']], function () {
	
	/* ================== Dashboard ================== */
	
	Route::get(config('laraadmin.adminRoute'), 'LA\DashboardController@index');
	Route::get(config('laraadmin.adminRoute'). '/dashboard', 'LA\DashboardController@index');
	
	/* ================== Users ================== */
	Route::resource(config('laraadmin.adminRoute') . '/users', 'LA\UsersController');
	Route::get(config('laraadmin.adminRoute') . '/user_dt_ajax', 'LA\UsersController@dtajax');
	
	/* ================== Uploads ================== */
	Route::resource(config('laraadmin.adminRoute') . '/uploads', 'LA\UploadsController');
	Route::post(config('laraadmin.adminRoute') . '/upload_files', 'LA\UploadsController@upload_files');
	Route::get(config('laraadmin.adminRoute') . '/uploaded_files', 'LA\UploadsController@uploaded_files');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_caption', 'LA\UploadsController@update_caption');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_filename', 'LA\UploadsController@update_filename');
	Route::post(config('laraadmin.adminRoute') . '/uploads_update_public', 'LA\UploadsController@update_public');
	Route::post(config('laraadmin.adminRoute') . '/uploads_delete_file', 'LA\UploadsController@delete_file');
	
	/* ================== Roles ================== */
	Route::resource(config('laraadmin.adminRoute') . '/roles', 'LA\RolesController');
	Route::get(config('laraadmin.adminRoute') . '/role_dt_ajax', 'LA\RolesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_module_role_permissions/{id}', 'LA\RolesController@save_module_role_permissions');
	
	/* ================== Permissions ================== */
	Route::resource(config('laraadmin.adminRoute') . '/permissions', 'LA\PermissionsController');
	Route::get(config('laraadmin.adminRoute') . '/permission_dt_ajax', 'LA\PermissionsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/save_permissions/{id}', 'LA\PermissionsController@save_permissions');
	
	/* ================== Departments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/departments', 'LA\DepartmentsController');
	Route::get(config('laraadmin.adminRoute') . '/department_dt_ajax', 'LA\DepartmentsController@dtajax');
	
	/* ================== Employees ================== */
	Route::resource(config('laraadmin.adminRoute') . '/employees', 'LA\EmployeesController');
	Route::get(config('laraadmin.adminRoute') . '/employee_dt_ajax', 'LA\EmployeesController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/change_password/{id}', 'LA\EmployeesController@change_password');
	
	/* ================== Backups ================== */
	Route::resource(config('laraadmin.adminRoute') . '/backups', 'LA\BackupsController');
	Route::get(config('laraadmin.adminRoute') . '/backup_dt_ajax', 'LA\BackupsController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/create_backup_ajax', 'LA\BackupsController@create_backup_ajax');
	Route::get(config('laraadmin.adminRoute') . '/downloadBackup/{id}', 'LA\BackupsController@downloadBackup');
    
    /* ================== Autors ================== */
	Route::resource(config('laraadmin.adminRoute') . '/autors', 'LA\AutorsController');
	Route::get(config('laraadmin.adminRoute') . '/autor_dt_ajax', 'LA\AutorsController@dtajax');
    
    /* ================== Tags_pages ================== */
	Route::resource(config('laraadmin.adminRoute') . '/tags_pages', 'LA\Tags_pagesController');
	Route::get(config('laraadmin.adminRoute') . '/tags_page_dt_ajax', 'LA\Tags_pagesController@dtajax');


	/* ================== Pages =================== */
	Route::resource(config('laraadmin.adminRoute') . '/site_pages', 'LA\Site_pagesController');
	Route::get(config('laraadmin.adminRoute') . '/site_page_dt_ajax', 'LA\Site_pagesController@dtajax');	

	Route::resource(config('laraadmin.adminRoute') . '/languages', 'LA\LanguagesController');
	Route::get(config('laraadmin.adminRoute') . '/language_dt_ajax', 'LA\LanguagesController@dtajax');

	Route::resource(config('laraadmin.adminRoute') . '/page_contents', 'LA\Page_contentsController');
	Route::get(config('laraadmin.adminRoute') . '/page_content_dt_ajax', 'LA\Page_contentsController@dtajax');

	Route::resource(config('laraadmin.adminRoute') . '/photo_shops', 'LA\Photo_shopsController');
	Route::get(config('laraadmin.adminRoute') . '/photo_shop_dt_ajax', 'LA\Photo_shopsController@dtajax');

	Route::resource(config('laraadmin.adminRoute') . '/shopping_countries', 'LA\Shopping_countriesController');
	Route::get(config('laraadmin.adminRoute') . '/shopping_country_dt_ajax', 'LA\Shopping_countriesController@dtajax');

	Route::resource(config('laraadmin.adminRoute') . '/print_types', 'LA\Print_typesController');
	Route::get(config('laraadmin.adminRoute') . '/print_type_dt_ajax', 'LA\Print_typesController@dtajax');

	Route::resource(config('laraadmin.adminRoute') . '/shop_tags', 'LA\Shop_tagsController');
	Route::get(config('laraadmin.adminRoute') . '/shop_tag_dt_ajax', 'LA\Shop_tagsController@dtajax');

	/* ================== Social_Networks ================== */
	Route::resource(config('laraadmin.adminRoute') . '/social_networks', 'LA\Social_NetworksController');
	Route::get(config('laraadmin.adminRoute') . '/social_network_dt_ajax', 'LA\Social_NetworksController@dtajax');

	/* ================== Footer_menu_lists ================== */
	Route::resource(config('laraadmin.adminRoute') . '/footer_menu_lists', 'LA\Footer_menu_listsController');
	Route::get(config('laraadmin.adminRoute') . '/footer_menu_list_dt_ajax', 'LA\Footer_menu_listsController@dtajax');

	/* ================== Stories ================== */
	Route::resource(config('laraadmin.adminRoute') . '/stories', 'LA\StoriesController');
	Route::get(config('laraadmin.adminRoute') . '/story_dt_ajax', 'LA\StoriesController@dtajax');

	/* ================== Blocks ================== */
	
    
	Route::resource(config('laraadmin.adminRoute') . '/blocks', 'LA\BlocksController');
	Route::get(config('laraadmin.adminRoute') . '/block_dt_ajax', 'LA\BlocksController@dtajax');
	Route::post(config('laraadmin.adminRoute') . '/block/addblock', 'LA\BlocksController@addblock')->name('addblock');
//	Route::get(config('laraadmin.adminRoute') . '/block/forms', 'LA\BlocksController@forms')->name('getblockforms');
	Route::get(config('laraadmin.adminRoute') . '/block/createBlock/{storyid}/{blockid}', 'LA\BlocksController@createBlock')->name('createblock');
	Route::get(config('laraadmin.adminRoute') . '/block/createBlock', 'LA\BlocksController@createBlock')->name('createbyid');
	Route::post(config('laraadmin.adminRoute') . '/block/editblock', 'LA\BlocksController@editblock')->name('editblock');
	Route::post(config('laraadmin.adminRoute') . '/block/sort', 'LA\BlocksController@blocksort')->name('blocksort');
    
    
	Route::post(config('laraadmin.adminRoute') . '/block/AddblockAudio', 'LA\BlocksController@AddblockAudio')->name('AddblockAudio');        
        
    Route::post(config('laraadmin.adminRoute') . '/block/editblockAudio', 'LA\BlocksController@editblockAudio')->name('editblockAudio');
    
    Route::get(config('laraadmin.adminRoute') . '/block/deleteBlock/{story_id}/{block_id}', 'LA\BlocksController@deleteBlock')->name('deleteBlock');
    

	/* ================== Block_types ================== */
	Route::resource(config('laraadmin.adminRoute') . '/block_types', 'LA\Block_typesController');
	Route::get(config('laraadmin.adminRoute') . '/block_type_dt_ajax', 'LA\Block_typesController@dtajax');

	/* ================== Logos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/logos', 'LA\LogosController');
	Route::get(config('laraadmin.adminRoute') . '/logo_dt_ajax', 'LA\LogosController@dtajax');

	/* ================== Translations ================== */
	Route::resource(config('laraadmin.adminRoute') . '/translations', 'LA\TranslationsController');
	Route::get(config('laraadmin.adminRoute') . '/translation_dt_ajax', 'LA\TranslationsController@dtajax');

	/* ================== Section_translations ================== */
//	Route::resource(config('laraadmin.adminRoute') . '/section_translations', 'LA\Section_translationsController');
//	Route::get(config('laraadmin.adminRoute') . '/section_translation_dt_ajax', 'LA\Section_translationsController@dtajax');
    
    /* ================== Freelancer_types ================== */
	Route::resource(config('laraadmin.adminRoute') . '/freelancer_types', 'LA\Freelancer_typesController');
	Route::get(config('laraadmin.adminRoute') . '/freelancer_type_dt_ajax', 'LA\Freelancer_typesController@dtajax');

	/* ================== Freelancer_cities ================== */
	Route::resource(config('laraadmin.adminRoute') . '/freelancer_cities', 'LA\Freelancer_citiesController');
	Route::get(config('laraadmin.adminRoute') . '/freelancer_city_dt_ajax', 'LA\Freelancer_citiesController@dtajax');

	/* ================== Freelancer_type_cities ================== */
	Route::resource(config('laraadmin.adminRoute') . '/freelancer_type_cities', 'LA\Freelancer_type_citiesController');
	Route::get(config('laraadmin.adminRoute') . '/freelancer_type_city_dt_ajax', 'LA\Freelancer_type_citiesController@dtajax');

	/* ================== Freelancer_skills ================== */
	Route::resource(config('laraadmin.adminRoute') . '/freelancer_skills', 'LA\Freelancer_skillsController');
	Route::get(config('laraadmin.adminRoute') . '/freelancer_skill_dt_ajax', 'LA\Freelancer_skillsController@dtajax');

	/* ================== Freelancer_languages ================== */
	Route::resource(config('laraadmin.adminRoute') . '/freelancer_languages', 'LA\Freelancer_languagesController');
	Route::get(config('laraadmin.adminRoute') . '/freelancer_language_dt_ajax', 'LA\Freelancer_languagesController@dtajax');

	/* ================== Freelancer_equipments ================== */
	Route::resource(config('laraadmin.adminRoute') . '/freelancer_equipments', 'LA\Freelancer_equipmentsController');
	Route::get(config('laraadmin.adminRoute') . '/freelancer_equipment_dt_ajax', 'LA\Freelancer_equipmentsController@dtajax');

	/* ================== Freelancer_resources ================== */
	Route::resource(config('laraadmin.adminRoute') . '/freelancer_resources', 'LA\Freelancer_resourcesController');
	Route::get(config('laraadmin.adminRoute') . '/freelancer_resource_dt_ajax', 'LA\Freelancer_resourcesController@dtajax');

	/* ================== Agency_main_pages ================== */
	Route::resource(config('laraadmin.adminRoute') . '/agency_main_pages', 'LA\Agency_main_pagesController');
	Route::get(config('laraadmin.adminRoute') . '/agency_main_page_dt_ajax', 'LA\Agency_main_pagesController@dtajax');
    
    /* ================== Contacts ================== */
	Route::resource(config('laraadmin.adminRoute') . '/contacts', 'LA\ContactsController');
	Route::get(config('laraadmin.adminRoute') . '/contact_dt_ajax', 'LA\ContactsController@dtajax');

	/* ================== Logos ================== */
	Route::resource(config('laraadmin.adminRoute') . '/logos', 'LA\LogosController');
	Route::get(config('laraadmin.adminRoute') . '/logo_dt_ajax', 'LA\LogosController@dtajax');
	


	/* ================== Vacancies ================== */
	Route::resource(config('laraadmin.adminRoute') . '/vacancies', 'LA\VacanciesController');
	Route::get(config('laraadmin.adminRoute') . '/vacancy_dt_ajax', 'LA\VacanciesController@dtajax');
    
    /* ================== Editions ================== */
    Route::resource(config('laraadmin.adminRoute') . '/editions', 'LA\EditionsController');
    Route::get(config('laraadmin.adminRoute') . '/edition_dt_ajax', 'LA\EditionsController@dtajax');

	/* ================== Story_authors ================== */
	Route::resource(config('laraadmin.adminRoute') . '/story_authors', 'LA\Story_authorsController');
	Route::get(config('laraadmin.adminRoute') . '/story_author_dt_ajax', 'LA\Story_authorsController@dtajax');

	/* ================== Story_types ================== */
	Route::resource(config('laraadmin.adminRoute') . '/story_types', 'LA\Story_typesController');
	Route::get(config('laraadmin.adminRoute') . '/story_type_dt_ajax', 'LA\Story_typesController@dtajax');

	/* ================== Sections ================== */
	Route::resource(config('laraadmin.adminRoute') . '/sections', 'LA\SectionsController');
	Route::post(config('laraadmin.adminRoute') . '/section_dt_ajax', 'LA\SectionsController@postdtajax');
	Route::get(config('laraadmin.adminRoute') . '/section_dt_ajax', 'LA\SectionsController@dtajax');
});
