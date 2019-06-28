<?php


route::get('/', [
    'uses' => 'newShopController@home',
    'as' => '/'
]);
route::get('women_clothes/{id}', [
    'uses' => 'newShopController@women_clothes',
    'as' => 'categories'
]);
route::get('/mail', [
    'uses' => 'newShopController@contact_us',
    'as' => '/contact-us'
]);
route::get('product/details/{id}', [
    'uses' =>'newShopController@product_details',
    'as' => 'product-details'
]);




//****************************dashboard************************************************
//
Route::group(['middleware'=>'AdminSecurity' ],  function(){


    route::get('/home/createCategory', [
        'uses' => 'dashboardController@createCategory',
        'as' => '/home/createCategory'
    ]);
    route::get('/home/manageCategory', [
        'uses' => 'dashboardController@manageCategory',
        'as' => 'manage-category'
    ]);
    route::get('/home/tables', [
        'uses' => 'dashboardController@tables',
        'as' => '/home/tables'
    ]);
    route::get('/home/forms', [
        'uses' => 'dashboardController@forms',
        'as' => '/home/forms'
    ]);
    route::Post('/home/save_category', [
        'uses' => 'dashboardController@category_save',
        'as' => 'category-save'
    ]);
    route::get('/home/unpublished_category/{id}',  [
        'uses' => 'dashboardController@category_unpublished',
        'as' =>'category-unpublished'
    ]);
    route::get('/home/published_category/{id}',  [
        'uses' => 'dashboardController@category_published',
        'as' =>'category-published'
    ]);
    route::get('/home/edit_category/{id}',  [
        'uses' => 'dashboardController@category_edit',
        'as' =>'category-edit'
    ]);
    route::post('/home/update_category',  [
        'uses' => 'dashboardController@category_update',
        'as' =>'update-category'
    ]);
    route::get('/home/delete_category/{id}',  [
        'uses' => 'dashboardController@category_delete',
        'as' =>'category-delete'
    ]);
    route::get('/brands/add' , [
        'uses' => 'BrandsController@index',
        'as' => 'create-brand'
    ]);
    route::get('/brands/manage' , [
        'uses' => 'BrandsController@mange_brands',
        'as' => 'manage-brand'
    ]);
    route::post('/brands/save' , [
        'uses' => 'BrandsController@save_brands',
        'as' => 'save-brand'
    ]);
    route::get('/product/create' , [
        'uses' => 'ProductController@create_product',
        'as' => 'create-product'
    ]);
    route::post('/multiple/upload' , [
        'uses' => 'ProductController@photoUpload',
        'as' => 'upload-post'
    ]);







    route::get('/product/manage' , [
        'uses' => 'ProductController@manage_product',
        'as' => 'manage-product'
    ]);
    route::post('/product/save' , [
        'uses' => 'ProductController@save_product',
        'as' => 'save-product'
    ]);
    route::get('/product/unpublished/{id}' , [
        'uses' => 'ProductController@product_unpublished',
        'as' => 'product-unpublished'
    ]);
    route::get('/product/published/{id}' , [
        'uses' => 'ProductController@product_published',
        'as' => 'product-published'
    ]);
    route::get('/product/edit/{id}' , [
        'uses' => 'ProductController@product_edit',
        'as' => 'product-edit'
    ]);
    route::post('/product/update' , [
        'uses' => 'ProductController@product_update',
        'as' => 'update-product'
    ]);
    route::get('/product/delete/{id}' , [
        'uses' => 'ProductController@product_delete',
        'as' => 'delete-product'
    ]);



    route::get('/brand/unpublished/{id}' , [
        'uses' => 'BrandsController@brand_unpublished',
        'as' => 'brand-unpublished'
    ]);
    route::get('/brand/published/{id}' , [
        'uses' => 'BrandsController@brand_published',
        'as' => 'brand-published'
    ]);
    route::get('/brand/edit/{id}' , [
        'uses' => 'BrandsController@brand_edit',
        'as' => 'brand-edit'
    ]);
    route::post('/brand/update' , [
        'uses' => 'BrandsController@brand_update',
        'as' => 'update-brand'
    ]);
    route::get('/brand/delete/{id}' , [
        'uses' => 'BrandsController@brand_delete',
        'as' => 'brand-delete'
    ]);


});




Route::post('cart/add', [
    'uses' =>'CartController@index',
    'as' =>'shopping-cart'
]);

Route::get('cart/show', [
    'uses' =>'CartController@cartShow',
    'as' =>'cart-show',

]);
Route::get('cart/delete/{id}', [
    'uses' =>'CartController@cartDelete',
    'as' =>'cart-delete',

]);
Route::post('cart/update', [
    'uses' =>'CartController@cartUpdate',
    'as' =>'qty-update'
]);
Route::get('checkout', [
    'uses' =>'CheckOutController@index',
    'as' =>'checkout'
]);
Route::post('/registration', [
    'uses' =>'CheckOutController@customerSave',
    'as' =>'customer-reg'
]);
Route::post('customer/login', [
    'uses' =>'CheckOutController@customerLoginCheck',
    'as' =>'customer-login'
]);
Route::get('checkout/shipping', [
    'uses' =>'CheckOutController@checkoutShipping',
    'as' =>'checkout-shipping'
]);
Route::post('shipping/save', [
    'uses' =>'CheckOutController@shippingSave',
    'as' =>'new-shipping'
]);
Route::get('checkout/payment', [
    'uses' =>'CheckOutController@checkoutPayment',
    'as' =>'checkout-payment'
]);
Route::post('new/order', [
    'uses' =>'CheckOutController@newOrder',
    'as' =>'new-order'
]);
Route::get('complete/order', [
    'uses' =>'CheckOutController@completeOrder',
    'as' =>'complete-order'
]);
Route::post('customer/logout', [
    'uses' =>'CustomerController@customerLogout',
    'as' =>'logout-customer'
]);
Route::get('customer/login', [
    'uses' =>'CustomerController@customerLogin',
    'as' =>'new-customer-Login'
]);
Route::post('customer/new-customer-login', [
    'uses' =>'CustomerController@newCustomerLoginCheck',
    'as' =>'new-customer-login-check'
]);
Route::get('login/customer', [
    'uses' =>'CustomerController@loginCustomer',
    'as' =>'login-customer'
]);
Route::get('customer/new-register', [
    'uses' =>'CustomerController@registerCustomer',
    'as' =>'new-customer-registration'
]);
Route::post('customer/registration', [
    'uses' =>'CustomerController@registrationCustomer',
    'as' =>'customer-new-register'
]);
Route::get('register/new-register-congrats', [
    'uses' =>'CustomerController@registrationCustomerSuccessful',
    'as' =>'new-register-congrats'
]);

Route::get('order/manage', [
    'uses' =>'ManageOrderController@manageOrder',
    'as' =>'manage-order'
]);
Route::get('order/detail/{id}', [
    'uses' =>'ManageOrderController@orderDetail',
    'as' =>'order-detail'
]);
Route::get('order/invoice/{id}', [
    'uses' =>'ManageOrderController@orderInvoice',
    'as' =>'order-invoice'
]);
Route::get('order/download/{id}', [
    'uses' =>'ManageOrderController@InvoiceDownload',
    'as' =>'invoice-download'
]);
Route::post('order/delete', [
    'uses' =>'ManageOrderController@orderDelete',
    'as' =>'order-delete'
]);







Route::get('photo/multiple', [
    'uses' =>'newShopController@multiplePhotoUpload',
    'as' =>'multiple-photo-upload'
]);
Route::post('photo/save', [
    'uses' =>'newShopController@multiplePhotoSave',
    'as' =>'file-upload'
]);


















Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');