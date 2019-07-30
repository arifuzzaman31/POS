<?php

Route::group(['prefix' => 'backend'], function(){
	Route::get('/', [
			'as'	=> '/',
			'uses'  => 'RegistrationController@index'
		]);
	Route::post('login-post', [
			'as'	=> 'login-post',
			'uses'  => 'RegistrationController@loginCheck'
		]);	
});

Route::group(['prefix' => 'backend','middleware' => 'admin'], function(){

	Route::get('dashboard', [
		'as'	=> 'dashboard',
		'uses'  => 'RegistrationController@dashboard'
	]);

	Route::post('registration-post', [
		'as'	=> 'registration-post',
		'uses'  => 'RegistrationController@store'
	]);

	Route::get('logout', [
		'as'	=> 'logout',
		'uses'  => 'RegistrationController@logout'
	]);
	
		// <---------Category Route------------->
		Route::get('get-category', [
			'as'	=> 'backend.get-category',
			'uses'  => 'CategoryController@index'
		]);

		Route::post('add-category', [
			'as'	=> 'category',
			'uses'  => 'CategoryController@store'
		]);

		Route::get('get-category-list', [
			'as'	=> 'backend.get-category-list',
			'uses'  => 'CategoryController@listCategory'
		]);

		Route::get('change-category-status/{id}', [
			'as'	=> 'backend.change-category-status',
			'uses'  => 'CategoryController@changeCategoryStatus'
		]);

		Route::get('delete-category/{category_id}','CategoryController@DeleteCategory')->name('backend.delete-category');

		Route::get('get-single-category/{id}','CategoryController@getSingleCategory')->name('backend.get-single-category');

		Route::get('update-category',[
			'as' => 'update-category',
			'uses' => 'CategoryController@saveUpdateCategory'
		]);

		//<!-- Sub Category Route -->
		Route::get('get-sub-category', [
			'as'	=> 'backend.get-sub-category',
			'uses'  => 'SubCategoryController@index'
		]);

		Route::get('get-sub-category-list', [
			'as'	=> 'backend.get-sub-category-list',
			'uses'  => 'SubCategoryController@getSubCategoryList'
		]);

		Route::post('save-sub-category', [
			'as'	=> 'backend.save-sub-category',
			'uses'  => 'SubCategoryController@store'
		]);

		Route::get('delete-sub-category/{id}', [
			'as'	=> 'backend.delete-sub-category',
			'uses'  => 'SubCategoryController@destroy'
		]);

		Route::get('change-sub-category-status/{id}', [
			'as'	=> 'backend.change-sub-category-status',
			'uses'  => 'SubCategoryController@changeStatus'
		]);

		Route::post('update-sub-category', [
			'as'	=> 'backend.update-sub-category',
			'uses'  => 'SubCategoryController@update'
		]);

			// <---------Brand Route------------->

		Route::get('get-brand',[
			'as' => 'backend.get-brand',
			'uses' => 'BrandController@index'
		]);
		Route::get('get-brand-list',[
			'as' => 'backend.get-brand-list',
			'uses' => 'BrandController@getBrandList'
		]);
		Route::get('delete-brand/{id}',[
			'as' => 'backend.delete-brand',
			'uses' => 'BrandController@destroy'
		]);
		Route::get('change-brand-status/{id}',[
			'as' => 'backend.change-brand-status',
			'uses' => 'BrandController@changeStatus'
		]);
		Route::post('store-brand',[
			'as' => 'backend.store-brand',
			'uses' => 'BrandController@store'
		]);
		Route::post('update-brand',[
			'as' => 'backend.update-brand',
			'uses' => 'BrandController@update'
		]);
			// <---------slider Route------------->
		Route::get('get-slider', [
			'as'	=> 'backend.get-slider',
			'uses'  => 'SliderController@index'
		]);
		Route::post('add-slider', [
			'as'	=> 'backend.add-slider',
			'uses'  => 'SliderController@store'
		]);
		Route::get('all-slider', [
			'as'	=> 'backend.all-slider',
			'uses'  => 'SliderController@allSlider'
		]);

		Route::get('delete-slider/{id}', [
			'as'	=> 'backend.delete-slider',
			'uses'  => 'SliderController@deleteSlider'
		]);

		Route::get('change-slider-status/{id}', [
			'as'	=> 'backend.change-slider-status',
			'uses'  => 'SliderController@sliderStatus'
		]);

		Route::get('Add-to-Product-slider', [
			'as'	=> 'backend.Add-to-Product-slider',
			'uses'  => 'SliderController@addToProductSlider'
		]);

		// Product Slider Related Route
		Route::get('product-slider-list', [
			'as'	=> 'backend.product-slider-list',
			'uses'  => 'SliderController@getProductSlider'
		]);

		Route::get('change-product-slider-status/{id}', [
			'as'	=> 'backend.change-product-slider-status',
			'uses'  => 'SliderController@ProductSliderStatus'
		]);

		Route::get('delete-product-slider/{id}', [
			'as'	=> 'backend.product-slider-list',
			'uses'  => 'SliderController@destroyProductSlider'
		]);

		// Product Image Route
		Route::get('get-product-image', [
			'as'	=> 'backend.get-product-image',
			'uses'  => 'ProductImageController@index'
		]);

		Route::post('add-product-image', [
			'as'	=> 'backend.add-product-image',
			'uses'  => 'ProductImageController@store'
		]);

		Route::get('get-product-image-list', [
			'as'	=> 'backend.get-product-image-list',
			'uses'  => 'ProductImageController@imageList'
		]);

		Route::get('change-image-status/{id}', [
			'as'	=> 'backend.change-image-status',
			'uses'  => 'ProductImageController@changeStatus'
		]);

		Route::get('delete-image/{id}', [
			'as'	=> 'backend.delete-image',
			'uses'  => 'ProductImageController@destroy'
		]);


		// Product and Size Route
		Route::get('product-size', [
			'as'	=> 'backend.product-size',
			'uses'  => 'ProductSizeController@index'
		]);
		Route::get('product-size-list', [
			'as'	=> 'backend.product-size-list',
			'uses'  => 'ProductSizeController@show'
		]);

		Route::get('change-product-size-status/{id}', [
			'as'	=> 'backend.change-product-size-status',
			'uses'  => 'ProductSizeController@changeStatus'
		]);
		Route::get('delete-product-size/{id}', [
			'as'	=> 'backend.delete-product-size',
			'uses'  => 'ProductSizeController@destroy'
		]);
		Route::post('store-product-and-size', [
			'as'	=> 'backend.store-product-and-size',
			'uses'  => 'ProductSizeController@store'
		]);

		// Product Related Route

		Route::get('get-product', [
			'as'	=> 'backend.get-product',
			'uses'  => 'ProductController@index'
		]);

		Route::post('store-product', [
			'as'	=> 'backend.store-product',
			'uses'  => 'ProductController@store'
		]);

		Route::post('update-product', [
			'as'	=> 'backend.update-product',
			'uses'  => 'ProductController@update'
		]);

		Route::get('get-product-list', [
			'as'	=> 'backend.get-product-list',
			'uses'  => 'ProductController@allProduct'
		]);
		Route::get('change-product-status/{id}', [
			'as'	=> 'backend.change-product-status',
			'uses'  => 'ProductController@changeStatus'
		]);
		Route::get('delete-product/{id}', [
					'as'	=> 'backend.delete-product',
					'uses'  => 'ProductController@delete'
				]);

		// ---- Item Companies-----

		Route::get('get-item-company', [
			'as'	=> 'backend.get-item-company',
			'uses'	=> 'ItemCompaniesController@index'
		]);
		Route::get('get-item-company-list', [
			'as'	=> 'backend.get-item-company-list',
			'uses'	=> 'ItemCompaniesController@getCompanyList'
		]);

		Route::get('change-item-company-status/{id}', [
			'as'	=> 'backend.change-item-company-status',
			'uses'	=> 'ItemCompaniesController@changeCompanyStatus'
		]);
		Route::get('delete-item-company/{id}', [
			'as'	=> 'backend.delete-item-company',
			'uses'	=> 'ItemCompaniesController@destroy'
		]);
		Route::post('store-company-status', [
			'as'	=> 'backend.store-company-status',
			'uses'	=> 'ItemCompaniesController@store'
		]);
		Route::post('update-company', [
			'as'	=> 'backend.update-company',
			'uses'	=> 'ItemCompaniesController@update'
		]);

		//----Product Color ------
		Route::get('get-product-color',[
			'as'  => 'backend.get-product-color',
			'uses'=> 'ColorController@index'
		]);
		Route::get('get-product-color-list',[
			'as'  => 'backend.get-product-color-list',
			'uses'=> 'ColorController@getColorList'
		]);
		Route::get('change-color-status/{id}',[
			'as'  => 'backend.change-color-status',
			'uses'=> 'ColorController@changeColorStatus'
		]);
		Route::get('delete-color/{id}',[
			'as'  => 'backend.delete-color',
			'uses'=> 'ColorController@destroy'
		]);
		Route::post('store-product-color',[
			'as'  => 'backend.store-product-color',
			'uses'=> 'ColorController@store'
		]);
		Route::post('update-color',[
			'as'  => 'backend.update-color',
			'uses'=> 'ColorController@update'
		]);

		//----Product size------
		Route::get('get-product-size',[
			'as'  => 'backend.get-product-size',
			'uses'=> 'SizeController@index'
		]);

		Route::get('get-product-size-list',[
			'as'  => 'backend.get-product-size-list',
			'uses'=> 'SizeController@getSizeList'
		]);
		Route::get('change-size-status/{id}',[
			'as'  => 'backend.change-size-status',
			'uses'=> 'SizeController@changeSizeStatus'
		]);
		Route::get('delete-size/{id}',[
			'as'  => 'backend.delete-size',
			'uses'=> 'SizeController@destroy'
		]);
		Route::post('store-product-size',[
			'as'  => 'backend.store-product-size',
			'uses'=> 'SizeController@store'
		]);
		Route::post('update-size',[
			'as'  => 'backend.update-size',
			'uses'=> 'SizeController@update'
		]);

});




// Route::post('registration-post', function(){
// 		return "hi";
// });

