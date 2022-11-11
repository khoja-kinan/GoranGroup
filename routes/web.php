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

Auth::routes(['register' => false]);

// Multi language pages Route
Route::group([
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],
     function(){ 
        Route::get('/', 'CompanyPagesController@showHome')->name('home');
        /* Company single page route */
        Route::get('/company/{id}', 'CompanyPagesController@show')->name('company');
        /* About Us page route */
        Route::get('/about-us','CompanyPagesController@aboutUs' )->name('about.us');
        /* Blog page route */
        Route::get('/post/{id}','CompanyPagesController@showBlog' )->name('blog');

        }
        
);//end of Multi language pages Route

Route::get('download/attachments/{compamy_name}/catalogs/{file_name}', 'CompanyPagesController@get_file');
Route::post('/contact', 'ContactFormController@store')->name('sendmail');







/* Dashboard routes */
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', function () {
        return view('backEnd.home');
    });

    // Post Routes
    Route::resource('admin/post', 'PostController');

    // Company Routes
    Route::resource('admin/company', 'CompanyController');
    
    // Company delete image route
    Route::post('delete_img/', 'ImgController@destroyIMG')->name('delete_img');
   
    // Section Routes
    Route::resource('admin/section', 'SectionController');

    // Roles Routes
    Route::resource('roles','RoleController');

    // User Routes
    Route::resource('users','UserController');

    // Video URL Routes
    Route::resource('video-url','AboutUsVideoController');

    // Home Slider Routes
    Route::resource('home-slider','HomeSliderController');
});
