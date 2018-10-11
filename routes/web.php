<?php


Route::get('/', [

    'uses' => 'EcommerceController@index',

    'as' => '/'
]);

//front-end template mastering route//


Route::get('/about-us', [

    'uses' => 'EcommerceController@aboutUs',

    'as' => 'about-us'
]);


Route::get('/product-category/{id}', [
    'uses'  => 'EcommerceController@categoryProduct',
    'as'    => 'category-product'
]);

Route::get('/details-product/{id}', [
    'uses'  => 'EcommerceController@productDetails',
    'as'    => 'product-details'
]);

Route::post('/add-to-cart', [
    'uses'  => 'CartController@addToCart',
    'as'    => 'add-to-cart'
]);

Route::get('/show-cart', [
    'uses'  => 'CartController@showToCart',
    'as'    => 'show-cart'
]);

Route::post('/cart-update', [
    'uses'  => 'CartController@updateCart',
    'as'    => 'cart-update'
]);

Route::get('/cart-delete/{rowId}', [
    'uses'  => 'CartController@deleteCart',
    'as'    => 'cart-delete'
]);

Route::get('/checkout', [
    'uses'  => 'CheckoutController@index',
    'as'    => 'checkout'
]);

Route::post('/new-customer', [
    'uses'  => 'CheckoutController@newCustomer',
    'as'    => 'new-customer'
]);

Route::get('/show-shipping', [
    'uses'  => 'CheckoutController@shippingInfo',
    'as'    => 'show-shipping'
]);

Route::post('/new-shipping', [
    'uses'  => 'CheckoutController@newShippingInfo',
    'as'    => 'new-shipping'
]);

Route::get('/payment-info', [
    'uses'  => 'CheckoutController@paymentInfo',
    'as'    => 'payment-info'
]);

Route::post('/new-order', [
    'uses'  => 'CheckoutController@newOrderInfo',
    'as'    => 'new-order'
]);

Route::get('/confirm-order', [
    'uses'  => 'CheckoutController@confirmOrderInfo',
    'as'    => 'confirm-order'
]);

Route::get('/customer-logout', [
    'uses'  => 'CheckoutController@customerLogout',
    'as'    => 'customer-logout'
]);

Route::post('/customer-login', [
    'uses'  => 'CheckoutController@customerLogin',
    'as'    => 'customer-login'
]);


Route::get('/customer-email-check/{a}', [
    'uses'  => 'CheckoutController@customerEmailCheck',
    'as'    => 'customer-email-check'
]);





Route::get('/contact-us', [

    'uses' => 'EcommerceController@contactUs',

    'as' => 'contact'
]);

//front-end template mastering route//


//Admin Route//


Route::get('/category-add', [

    'uses' => 'CategoryController@addCategory',
    'as' => 'add-category'
]);

Route::post('/category-save', [

    'uses' => 'CategoryController@saveCategory',
    'as' => 'save-category'
]);


Route::get('/category-manage', [

    'uses' => 'CategoryController@manageCategory',
    'as' => 'manage-category'
]);


Route::get('/category-edit/{id}', [

    'uses' => 'CategoryController@editCategory',
    'as' => 'edit-category'
]);

Route::post('/category-update', [

    'uses' => 'CategoryController@updateCategory',
    'as' => 'update-category'
]);

Route::get('/category-delete/{id}', [

    'uses' => 'CategoryController@deleteCategory',
    'as' => 'delete-category'
]);


//brand Info//

Route::get('/brand-add', [

    'uses' => 'BrandController@addBrand',
    'as' => 'add-brand'
]);

Route::post('/brand-save', [

    'uses' => 'BrandController@saveBrand',
    'as' => 'save-brand'
]);


Route::get('/brand-manage', [

    'uses' => 'BrandController@manageBrand',
    'as' => 'manage-brand'
]);

Route::get('/brand-edit/{id}', [

    'uses' => 'BrandController@editBrand',
    'as' => 'edit-brand'
]);

Route::post('/brand-update', [

    'uses' => 'BrandController@updateBrand',
    'as' => 'update-brand'
]);

Route::get('/brand-delete/{id}', [

    'uses' => 'BrandController@deleteBrand',
    'as' => 'delete-brand'
]);



//product Info//

Route::get('/product-add', [

    'uses' => 'ProductController@addProduct',
    'as' => 'add-product'
]);
Route::post('/product-save', [

    'uses' => 'ProductController@saveProduct',
    'as' => 'save-product'
]);

Route::get('/product-manage', [

    'uses' => 'ProductController@manageProduct',
    'as' => 'manage-product'
]);

Route::get('/product-edit/{id}', [

    'uses' => 'ProductController@editProduct',
    'as' => 'edit-product'
]);

Route::post('/product-update', [

    'uses' => 'ProductController@updateProduct',
    'as' => 'update-product'
]);





Route::group(['middleware' => 'admin'], function() {

    Route::get('/product-delete/{id}', [

        'uses' => 'ProductController@deleteProduct',
        'as' => 'delete-product'
    ]);


    Route::get('/manage-order', [

        'uses' => 'OrderController@manageOrder',
        'as' => 'manage-order',
    ]);

    Route::get('/view-order-details/{id}', [

        'uses' => 'OrderController@viewOrderDetail',
        'as' => 'view-order-details',
    ]);

    Route::get('/view-order-invoice/{id}', [

        'uses' => 'OrderController@viewOrderInvoice',
        'as' => 'view-order-invoice'
    ]);

    Route::get('/print-order-invoice/{id}', [

        'uses' => 'OrderController@printOrderInvoice',
        'as' => 'print-order-invoice'
    ]);


});


//Admin Route//


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
