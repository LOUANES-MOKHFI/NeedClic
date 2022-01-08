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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
	Auth::routes();
		
	Route::group(['namespace' => 'Site' ],function(){
		Route::get('/register-particulier', 'HomeController@register_particulier')->name('register.particulier');
		Route::get('/register-ingenieur', 'HomeController@register_ingenieur')->name('register.ingenieur');
		Route::get('/register-artisant', 'HomeController@register_artisant')->name('register.artisant');
		Route::get('/register-artisanat', 'HomeController@register_artisanat')->name('register.artisanat');
		Route::get('/register-clients', 'HomeController@register_clients')->name('register.clients');
		
		////home
		Route::get('/','HomeController@index')->name('home');
		Route::get('/users/get-commune/{id}','HomeController@getCommune');
		Route::get('/users/get-category/{type}','HomeController@getCategory');

		////About
		Route::get('/about','AboutController@index')->name('about');

		////annonces
		Route::group(['prefix' => 'annonces' ],function(){
		
			Route::get('/','AnnoncesController@index')->name('annonces');
			Route::get('/show/{uuid}','AnnoncesController@show')->name('annonces.show');
			Route::get('/search','AnnoncesController@search')->name('annonces.search');
			///Annonces by services
			Route::get('/service/{slug}','AnnoncesController@AnnonceBoutiqueByService')->name('annonces.service');
			Route::get('/annonce-type/{type}','AnnoncesController@AnnonceParticulierOrArtisanat')->name('annonces.annonce_type');
			Route::get('/category/{slug}','AnnoncesController@GetAnnonceByCat')->name('annonces.category');

		});

		////account by category

		Route::group(['prefix' => 'categories' ],function(){			

			Route::get('/proffessionnelles/{type}','AnnoncesController@getAllCategory')->name('categories.proffessionnelles');
			Route::get('/artisanat/{type}','AnnoncesController@getAllCategory')->name('categories.artisanat');
			Route::get('/particulier/{type}','AnnoncesController@getAllCategory')->name('categories.particulier');


		});

		Route::group(['prefix' => 'comptes' ],function(){
			
			Route::get('/{slug}/{type}','AnnoncesController@ProffByCategory')->name('comptes.category');
			Route::get('/boutiques/service/{slug}','AnnoncesController@BoutiqueByService')->name('comptes.service');

			Route::get('/filtre-boutique','AnnoncesController@FilterBoutique')->name('comptes.filtre.boutique');
			Route::get('/filtre-ingenieur','AnnoncesController@FilterIngenieur')->name('comptes.filtre.ingenieur');
			Route::get('/filtre-artisant','AnnoncesController@FilterArtisant')->name('comptes.filtre.artisant');
			Route::get('/filtre-particulier','AnnoncesController@FilterParticulier')->name('comptes.filtre.particulier');
			Route::get('/filtre-artisanat','AnnoncesController@FilterArtisanat')->name('comptes.filtre.artisanat');

		});
		Route::get('/compte-like/{compte_uuid}/{user_uuid}/{annonce_id}','AnnoncesController@LikeCompte')->name('comptes.like');
		Route::get('/account-rating','BoutiqueController@setRating')->name('comptes.rating');
		Route::get('/get-rating/{id}','BoutiqueController@getRating')->name('comptes.get_rating');
		////blogs
		Route::group(['prefix' => 'blogs' ],function(){
		
			Route::get('/','BlogsController@index')->name('blogs');
			Route::get('/show/{uuid}','BlogsController@show')->name('blogs.show');
			Route::get('/search','BlogsController@search')->name('blogs.search');
			Route::get('/category/{slug}','BlogsController@BlogByCategory')->name('blogs.category');

		});

		////contact
		Route::group(['prefix' => 'contact' ],function(){
		
			Route::get('/','ContactController@index')->name('contact');
			Route::post('/store','ContactController@store')->name('contact.store');
		});

		////contact
		Route::group(['prefix' => 'boutique' ],function(){
		
			Route::get('/{uuid}','BoutiqueController@index')->name('boutique');
			//Route::post('/store','ContactController@store')->name('contact.store');
		});
		Route::get('/show-album/{uuid}','AlbumController@showAlbum')->name('users.albums.showAlbum');

		////Dasboard
		Route::group(['prefix' => 'users','middleware' => 'auth'],function(){
			Route::get('/profil','ProfilController@index')->name('users.profil')->middleware('userAuth');
			Route::get('/profil/edit-description','ProfilController@editDescription')->name('users.profil.editDescription')->middleware('userAuth');
			Route::post('/profil/store-description/{uuid}','ProfilController@storeDescription')->name('users.profil.storeDescription')->middleware('userAuth');
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


