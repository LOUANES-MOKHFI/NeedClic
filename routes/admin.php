<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => LaravelLocalization::setLocale(),
			  'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
	///login 
	Route::get('/admin','Admin\LoginController@login')->name('admin.login');
	Route::group(['namespace' => 'Admin', 'middleware'=>'guest:admins','prefix' => 'admin'],function(){
	    Route::get('login','LoginController@login')->name('admin.login');
	    Route::post('login','LoginController@Postlogin')->name('admin.login');
	});

	Route::group(['namespace' => 'Admin','middleware'=>'auth:admins','prefix' => 'admin' ],function(){
		///index Page
	    Route::get('index','DashboardController@index')->name('admin.index');
	    //Logout
	    Route::get('logout','LoginController@logout')->name('admin.logout');
	});

	/////Routes ///////////
	Route::group(['namespace' => 'Admin','middleware'=>'auth:admins','prefix' => 'admin' ],function(){

		///Settings
		Route::group(['prefix' => 'settings','middleware' => 'can:settings'],function(){
			Route::get('/','SettingsController@index')->name('admin.settings');
			Route::get('/edit/{id}','SettingsController@edit')->name('admin.settings.edit');
			Route::post('/update/{id}','SettingsController@update')->name('admin.settings.update');

			////roles 
			Route::group(['prefix' => 'roles',/*'middleware' => 'can:roles'*/],function(){
		        Route::get('/','RolesController@index')->name('admin.settings.roles');
		        Route::get('create','RolesController@create')->name('admin.settings.roles.create');
		        Route::post('store','RolesController@store')->name('admin.settings.roles.store');
		        Route::get('edit/{uuid}','RolesController@edit')->name('admin.settings.roles.edit');
		        Route::post('update/{uuid}','RolesController@update')->name('admin.settings.roles.update');
		        Route::get('delete/{uuid}','RolesController@destroy')->name('admin.settings.roles.delete');
		    });

		    ////categories_annonces 
			Route::group(['prefix' => 'categories_annonces',/*'middleware' => 'can:categories_annonces'*/],function(){
		        Route::get('/','CategoryAnnonceController@index')->name('admin.settings.categories_annonces');
		        Route::get('create','CategoryAnnonceController@create')->name('admin.settings.categories_annonces.create');
		        Route::post('store','CategoryAnnonceController@store')->name('admin.settings.categories_annonces.store');
		        Route::get('edit/{uuid}','CategoryAnnonceController@edit')->name('admin.settings.categories_annonces.edit');
		        Route::post('update/{uuid}','CategoryAnnonceController@update')->name('admin.settings.categories_annonces.update');
		        Route::get('delete/{uuid}','CategoryAnnonceController@destroy')->name('admin.settings.categories_annonces.delete');
		    });
		    ////categories_blogs 
			Route::group(['prefix' => 'categories_blogs',/*'middleware' => 'can:categories_blogs'*/],function(){
		        Route::get('/','CategoryBlogController@index')->name('admin.settings.categories_blogs');
		        Route::get('create','CategoryBlogController@create')->name('admin.settings.categories_blogs.create');
		        Route::post('store','CategoryBlogController@store')->name('admin.settings.categories_blogs.store');
		        Route::get('edit/{uuid}','CategoryBlogController@edit')->name('admin.settings.categories_blogs.edit');
		        Route::post('update/{uuid}','CategoryBlogController@update')->name('admin.settings.categories_blogs.update');
		        Route::get('delete/{uuid}','CategoryBlogController@destroy')->name('admin.settings.categories_blogs.delete');
		    });
		    ////services
			Route::group(['prefix' => 'services',/*'middleware' => 'can:services'*/],function(){
		        Route::get('/','ServiceController@index')->name('admin.settings.services');
		        Route::get('create','ServiceController@create')->name('admin.settings.services.create');
		        Route::post('store','ServiceController@store')->name('admin.settings.services.store');
		        Route::get('edit/{uuid}','ServiceController@edit')->name('admin.settings.services.edit');
		        Route::post('update/{uuid}','ServiceController@update')->name('admin.settings.services.update');
		        Route::get('delete/{uuid}','ServiceController@destroy')->name('admin.settings.services.delete');
		    });

		    ////abonnements
			Route::group(['prefix' => 'abonnements',/*'middleware' => 'can:abonnements'*/],function(){
		        Route::get('/','AbonnementController@index')->name('admin.settings.abonnements');
		        Route::get('create','AbonnementController@create')->name('admin.settings.abonnements.create');
		        Route::post('store','AbonnementController@store')->name('admin.settings.abonnements.store');
		        Route::get('edit/{uuid}','AbonnementController@edit')->name('admin.settings.abonnements.edit');
		        Route::post('update/{uuid}','AbonnementController@update')->name('admin.settings.abonnements.update');
		        Route::get('delete/{uuid}','AbonnementController@destroy')->name('admin.settings.abonnements.delete');
		    });
		    ////images 
			Route::group(['prefix' => 'images',/*'middleware' => 'can:images'*/],function(){
		        Route::get('/','ImageCompteController@index')->name('admin.settings.images');
		        Route::get('edit/{uuid}','ImageCompteController@edit')->name('admin.settings.images.edit');
		        Route::post('update/{uuid}','ImageCompteController@update')->name('admin.settings.images.update');
		        Route::get('delete/{uuid}','ImageCompteController@destroy')->name('admin.settings.images.delete');
		    });
			
		});
		///Routes Admin
		Route::group(['prefix' => 'admins','middleware' => 'can:admins'],function(){
			Route::get('/','AdminController@index')->name('admin.admins');
			Route::get('/create','AdminController@create')->name('admin.admins.create');
			Route::post('/store','AdminController@store')->name('admin.admins.store');
			Route::get('/edit/{uuid}','AdminController@edit')->name('admin.admins.edit');
			Route::post('/update/{uuid}','AdminController@update')->name('admin.admins.update');
			Route::get('/show/{uuid}','AdminController@show')->name('admin.admins.show');
			Route::get('/delete/{uuid}','AdminController@destroy')->name('admin.admins.delete');
		});
		//////Users //boutique, proff, particulier, artisanat
 		Route::group(['prefix' => 'users','middleware' => 'can:users'],function(){
			Route::get('/','MemberController@index')->name('admin.users');
			Route::get('/create','MemberController@create')->name('admin.users.create');
			Route::post('/store','MemberController@store')->name('admin.users.store');
			Route::get('/edit/{uuid}','MemberController@edit')->name('admin.users.edit');
			Route::get('/show/{uuid}','MemberController@show')->name('admin.users.show');
			Route::post('/update/{uuid}','MemberController@update')->name('admin.users.update');
			Route::get('/delete/{uuid}','MemberController@destroy')->name('admin.users.delete');
			Route::get('/changeStatus/{uuid}','MemberController@changeStatus')->name('admin.users.changeStatus');
			Route::get('/AddToHome/{uuid}','MemberController@AddToHome')->name('admin.users.AddToHome');

		});

		//////blogs
		Route::group(['prefix' => 'blogs','middleware' => 'can:blogs'],function(){
			Route::get('/','BlogController@index')->name('admin.blogs');
			Route::get('/show/{uuid}','BlogController@show')->name('admin.blogs.show');
			Route::get('/create','BlogController@create')->name('admin.blogs.create');
			Route::post('/store','BlogController@store')->name('admin.blogs.store');
			Route::get('/edit/{uuid}','BlogController@edit')->name('admin.blogs.edit');
			Route::post('/update/{uuid}','BlogController@update')->name('admin.blogs.update');
			Route::get('/delete/{uuid}','BlogController@destroy')->name('admin.blogs.delete');

			///delete attachements
			Route::get('/deleteImage/{id}','BlogController@deleteImage')->name('admin.blogs.deleteImage');
			///add attachements
		    Route::post('/storeAttachements','BlogController@storeAttachements')->name('users.blogs.storeAttachements');

		});

		//////publicite
		Route::group(['prefix' => 'publicite','middleware' => 'can:publicite'],function(){
			Route::get('/','PubliciteController@index')->name('admin.publicite');
			Route::get('/show/{uuid}','PubliciteController@show')->name('admin.publicite.show');
			Route::get('/create','PubliciteController@create')->name('admin.publicite.create');
			Route::post('/store','PubliciteController@store')->name('admin.publicite.store');
			Route::get('/edit/{uuid}','PubliciteController@edit')->name('admin.publicite.edit');
			Route::post('/update/{uuid}','PubliciteController@update')->name('admin.publicite.update');
			Route::get('/delete/{uuid}','PubliciteController@destroy')->name('admin.publicite.delete');
			Route::post('/changeStatus','PubliciteController@changeStatus')->name('admin.publicite.changeStatus');
			Route::get('/AddToBasPage/{uuid}','PubliciteController@AddToBasPage')->name('admin.publicite.AddToBasPage');

		});
		//////annonces
		Route::group(['prefix' => 'annonces','middleware' => 'can:annonces'],function(){
			Route::get('/','AnnonceController@index')->name('admin.annonces');
			Route::get('/show/{uuid}','AnnonceController@show')->name('admin.annonces.show');
			Route::get('/create','AnnonceController@create')->name('admin.annonces.create');
			Route::post('/store','AnnonceController@store')->name('admin.annonces.store');
			Route::get('/edit/{uuid}','AnnonceController@edit')->name('admin.annonces.edit');
			Route::post('/update/{uuid}','AnnonceController@update')->name('admin.annonces.update');
			Route::get('/delete/{uuid}','AnnonceController@destroy')->name('admin.annonces.delete');
			Route::get('/approuver/{uuid}','AnnonceController@Approuver')->name('admin.annonces.approuver');
			Route::get('/get-annonce/{type_id}','AnnonceController@getAnnonce')->name('admin.annonces.getAnnonce');

			///attachements
			Route::get('/deleteImage/{id}','AnnonceController@deleteImage')->name('admin.annonces.deleteImage');


		});


		//////Contact Message
		Route::group(['prefix' => 'contact','middleware' => 'can:contact'],function(){
			Route::get('/','ContactController@index')->name('admin.contact');
			Route::get('/show/{id}','ContactController@show')->name('admin.contact.show');
			Route::get('/create','ContactController@create')->name('admin.contact.create');
			Route::post('/store','ContactController@store')->name('admin.contact.store');
			Route::get('/edit/{uuid}','ContactController@edit')->name('admin.contact.edit');
			Route::post('/update/{uuid}','ContactController@update')->name('admin.contact.update');
			Route::get('/delete/{uuid}','ContactController@destroy')->name('admin.contact.delete');

		});

		
		

		/////Profil
		Route::group(['prefix' => 'profil'],function(){
			Route::get('/edit','ProfilController@editProfil')->name('admin.profil.edit');
			Route::post('/updateProfil/{uuid}','ProfilController@updateProfil')->name('admin.profil.updateProfil');
			Route::post('/updateProfilPassword/{uuid}','ProfilController@updateProfilPassword')->name('admin.profil.updateProfilPassword');
		});
	});



});
