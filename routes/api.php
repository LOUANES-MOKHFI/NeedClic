<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\TokenController;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/token',[TokenController::class,'store']);

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
	Auth::routes();
		
	Route::group(['namespace' => 'Api/Site' ],function(){
		
		////home
		Route::get('/users/get-commune/{id}','HomeController@getCommune');
		Route::get('/users/get-category/{type}','HomeController@getCategory');

		////About

		////annonces
		

		////account by category

		

		

		////contact
		

		////boutique
		
		Route::get('/show-album/{uuid}','AlbumController@showAlbum')->name('users.albums.showAlbum');

		////Dasboard
		Route::group(['prefix' => 'users','middleware' => 'auth'],function(){
			Route::get('/profil','ProfilController@index')->name('users.profil')->middleware('userAuth');
			Route::post('/updatePassword','ProfilController@updatePassword')->name('users.profil.updatePassword')->middleware('userAuth');
			Route::post('/updateInfo','ProfilController@updateInfo')->name('users.profil.updateInfo')->middleware('userAuth');
			Route::post('/updatePortfolio/{uuid}','ProfilController@updatePortfolio')->name('users.profil.updatePortfolio')->middleware('userAuth');
			Route::get('/deleteImage/{id}','ProfilController@deleteImage')->name('users.profil.deleteImage')->middleware('userAuth');

			
			Route::group(['prefix' => 'dashboard' ],function(){
				Route::get('/','DashboardController@index')->name('users.dashboard')->middleware('userAuth');
			});
			Route::group(['prefix' => 'annonces' ],function(){
				Route::get('/','DashboardController@annonces')->name('users.annonces')->middleware('userAuth');
				Route::get('/show/{uuid}','DashboardController@show')->name('users.annonces.show')->middleware('userAuth');
				Route::get('/create','DashboardController@create')->name('users.annonces.create')->middleware('userAuth');
				Route::post('/store','DashboardController@store')->name('users.annonces.store')->middleware('userAuth');
				Route::get('/edit/{uuid}','DashboardController@edit')->name('users.annonces.edit')->middleware('userAuth');
				Route::post('/update/{uuid}','DashboardController@update')->name('users.annonces.update')->middleware('userAuth');
				Route::get('/delete/{uuid}','DashboardController@destroy')->name('users.annonces.delete')->middleware('userAuth');
				///attachements
				Route::post('/storeAttachements','DashboardController@storeAttachements')->name('users.annonces.storeAttachements')->middleware('userAuth');
				Route::get('/deleteImage/{id}','DashboardController@deleteImage')->name('users.annonces.deleteImage')->middleware('userAuth');
			});

			Route::group(['prefix' => 'albums' ],function(){
				Route::get('/','AlbumController@index')->name('users.albums')->middleware('userAuth');
				Route::get('/show/{uuid}','AlbumController@show')->name('users.albums.show')->middleware('userAuth');
				Route::get('/create','AlbumController@create')->name('users.albums.create')->middleware('userAuth');
				Route::post('/store','AlbumController@store')->name('users.albums.store')->middleware('userAuth');
				Route::get('/edit/{uuid}','AlbumController@edit')->name('users.albums.edit')->middleware('userAuth');
				Route::post('/update/{uuid}','AlbumController@update')->name('users.albums.update')->middleware('userAuth');
				Route::get('/delete/{uuid}','AlbumController@destroy')->name('users.albums.delete')->middleware('userAuth');
				///attachements
				Route::post('/storeAttachements','AlbumController@storeAttachements')->name('users.albums.storeAttachements')->middleware('userAuth');
				Route::get('/deleteImage/{id}','AlbumController@deleteImage')->name('users.albums.deleteImage')->middleware('userAuth');

			});
		});
	});

});






